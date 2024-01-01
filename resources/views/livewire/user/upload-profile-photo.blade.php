<div>
    <h1>Upload a new profile photo</h1>

    <form action="#" method="post" wire:submit.prevent="uploadPhoto">
        <input type="file" name="profile-photo" wire:model="profilePhoto"> <br>

        @error('profilePhoto')
            <p> {{ $message }} </p>
        @enderror

        <button type="submit">Upload</button>
    </form>
</div>
