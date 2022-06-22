<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Complaint') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm ">
                <div class=" bg-white border-b border-gray-200">
                    <section class="max-w-4xl mx-auto py-8">
                        <h1 class="text-lg font-bold mb-6 pb-2 border-b">
                            Complaint
                        </h1>
                        <div class="flex">

                            <x-panel class="flex-1">
                                <form method="POST" action="/complaint" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-6">
                                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                                            Name
                                        </label>
                                        <input class="border border-gray-200 p-2 rounded w-full" type="text" name="name"
                                            value="{{Auth::user()->name}}" id="name" required>
                                    </div>
                                    <div class="mb-6">
                                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                                            Email
                                        </label>
                                        <input class="border border-gray-200 p-2 rounded w-full" type="text" name="email"
                                            value="{{Auth::user()->email}}" id="email" required>
                                    </div>
                                    <div class="mb-6">
                                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="subject">
                                            Subject
                                        </label>

                                        <input class="border border-gray-200 p-2 rounded w-full" type="text" name="subject"
                                            value="{{ old('subject') }}" id="subject" required>

                                        @error('subject')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="comp_type">
                                            Complaint Type
                                        </label>

                                            <select class="custom-select" name="comp_type" id="comp_type" required>
                                                <option value="" selected>Select</option>
                                                <option value="incubator">incubator</option>
                                                <option value="Bootcamp">Bootcamp</option>
                                                <option value="CSR">CSR</option>
                                                {{-- <option value="Elite">Elite</option>
                                                <option value="DT">Diploma Track</option>
                                                <option value="VBC">VBC</option>
                                                <option value="Services">Services</option>
                                                <option value="Teacher">Teacher</option>
                                                <option value="Meetups">Meetups</option>
                                                <option value="digitalmarketing">Digital Marketing</option> --}}
                                              </select>

                                        @error('comp_type')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                                            File Picture
                                        </label>

                                        <input class="border border-gray-200 p-2 rounded w-full" type="file" name="thumbnail"
                                            id="thumbnail" required>

                                        @error('thumbnail')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                                            Description
                                        </label>

                                        <textarea class="border border-gray-200 p-2 rounded w-full" type="text" name="body" id="body"
                                            required>{{ old('body') }}</textarea>

                                        @error('body')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="priority">
                                            Priority
                                        </label>

                                            <select class="custom-select" name="priority" id="priority" required>
                                                <option value="" selected>Select</option>
                                                <option value="0">Average</option>
                                                <option value="1">Very High</option>
                                              </select>

                                        @error('priority')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="phone_number">
                                            Phone Number
                                        </label>

                                        <input class="border border-gray-200 p-2 rounded w-full" type="number" name="phone_number" id="phone_number"
                                            value="{{ old('phone_number') }}" required>

                                        @error('phone_number')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <button type="submit"
                                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                                    </div>
                                </form>
                            </x-panel>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
