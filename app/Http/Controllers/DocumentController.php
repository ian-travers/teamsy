<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function show(User $user, string $filename)
    {
        /** @var \App\Models\Document $document */
        $document = $user->documents()->firstWhere('filename', $filename);

        abort_unless(request()->user()->isAdmin(), Response::HTTP_FORBIDDEN);

        if ($document->extension == 'pdf') {
            return response(Storage::disk('s3')->get("documents/{$user->id}/$filename"))
                ->header('Content-Type', 'application/pdf');
        }
    }
}
