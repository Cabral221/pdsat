@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create User'))

@section('content')
    <x-forms.post :action="route('admin.auth.user.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : '{{ $model::TYPE_USER }}'}">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                        <div class="col-md-10">
                            <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                                <option value="{{ $model::TYPE_USER }}">@lang('User')</option>
                                <option value="{{ $model::TYPE_ADMIN }}">@lang('Administrator')</option>
                            </select>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="registration_number" class="col-md-2 col-form-label">@lang('Registration number')</label>

                        <div class="col-md-10">
                            <input type="text" name="registration_number" class="form-control" placeholder="{{ __('Registration number') }}" value="{{ old('registration_number') }}" maxlength="10" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="service_id" class="col-md-2 col-form-label">@lang('Service')</label>

                        <div class="col-md-10">
                            <select name="service_id" id="service" class="form-control @error('service_id') is-invalid @enderror">
                                <option value="" default>Service affecté</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->libele }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="first_name" class="col-md-2 col-form-label">@lang('Prénom')</label>

                        <div class="col-md-10">
                            <input type="text" name="first_name" class="form-control" placeholder="{{ __('Prénom') }}" value="{{ old('first_name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="phone" class="col-md-2 col-form-label">@lang('Phone number')</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">+221</span>
                                </div>
                                <input type="number" name="phone" class="form-control" placeholder="77XXXXXXX" value="{{ old('phone') }}"  aria-describedby="inputGroupPrepend" required />
                            </div>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('E-mail Address')</label>

                        <div class="col-md-10">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label">@lang('Password')</label>

                        <div class="col-md-10">
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="new-password" />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="password_confirmation" class="col-md-2 col-form-label">@lang('Password Confirmation')</label>

                        <div class="col-md-10">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="new-password" />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="active" class="col-md-2 col-form-label">@lang('Active')</label>

                        <div class="col-md-10">
                            <div class="form-check">
                                <input name="active" id="active" class="form-check-input" type="checkbox" value="1" {{ old('active', true) ? 'checked' : '' }} />
                            </div><!--form-check-->
                        </div>
                    </div><!--form-group-->

                    <div x-data="{ emailVerified : false }">
                        <div class="form-group row">
                            <label for="email_verified" class="col-md-2 col-form-label">@lang('E-mail Verified')</label>

                            <div class="col-md-10">
                                <div class="form-check">
                                    <input
                                        type="checkbox"
                                        name="email_verified"
                                        id="email_verified"
                                        value="1"
                                        class="form-check-input"
                                        x-on:click="emailVerified = !emailVerified"
                                        {{ old('email_verified') ? 'checked' : '' }} />
                                </div><!--form-check-->
                            </div>
                        </div><!--form-group-->

                        <div x-show="!emailVerified">
                            <div class="form-group row">
                                <label for="send_confirmation_email" class="col-md-2 col-form-label">@lang('Send Confirmation E-mail')</label>

                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            name="send_confirmation_email"
                                            id="send_confirmation_email"
                                            value="1"
                                            class="form-check-input"
                                            {{ old('send_confirmation_email') ? 'checked' : '' }} />
                                    </div><!--form-check-->
                                </div>
                            </div><!--form-group-->
                        </div>
                    </div>

                    @include('backend.auth.includes.roles')

                    @if (!config('boilerplate.access.user.only_roles'))
                        @include('backend.auth.includes.permissions')
                    @endif
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create User')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
