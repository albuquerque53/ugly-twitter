<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class UploadProfilePhoto extends Component
{
    use WithFileUploads;

    public ?TemporaryUploadedFile $profilePhoto = null;

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('livewire.user.upload-profile-photo');
    }

    public function uploadPhoto(): void
    {
        $this->validate([
            'profilePhoto' => 'required|image|max:1024',
        ]);

        /** @var User $currentUser */
        $currentUser = auth()->user();

        $fileName = "profile_photo_{$currentUser->id}.{$this->profilePhoto->getClientOriginalExtension()}";

        $path = $this->profilePhoto->storeAs('users', $fileName);

        $currentUser->profile_photo_path = $path;
        $currentUser->save();

        $this->redirect('/tweets');
    }
}
