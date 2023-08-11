<div>
    <x-organisms.form performAction="{{ $action }}">
        <div>
            <x-atoms.forms.label for="name">Name</x-atoms.label>
            <x-atoms.forms.textbox type="text" name="name" id="name" wire:model.defer="form.name" autocomplete="off"/>
            <x-atoms.forms.validation for="form.name"/>
        </div>
        <div>
            <x-atoms.forms.label for="project_id">Project ID</x-atoms.label>
            <x-atoms.forms.textbox type="text" name="project_id" id="project_id" wire:model.defer="form.project_id" autocomplete="off"/>
            <x-atoms.forms.validation for="form.project_id"/>
        </div>
        <div>
            <x-atoms.forms.label for="auth_token">Name</x-atoms.label>
            <x-atoms.forms.textbox type="text" name="auth_token" id="auth_token" wire:model.defer="form.auth_token" autocomplete="off"/>
            <x-atoms.forms.validation for="form.auth_token"/>
        </div>
        <div>
            <x-atoms.forms.label for="space_url">Space Url</x-atoms.label>
            <x-atoms.forms.textbox type="text" name="space_url" id="space_url" wire:model.defer="form.space_url" autocomplete="off"/>
            <x-atoms.forms.validation for="form.space_url"/>
        </div>
    </x-organisms.form>
</div>
