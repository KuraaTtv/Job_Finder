@include('layout')

<x-card class="p-10 max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Update a Job
                        </h2>
                        <p class="mb-4">{{$job->job_name}}</p>
                    </header>

                    <form method="get" action="/Folder/{{$job->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-6">
                            <label for="company"class="inline-block text-lg mb-2">Job Name</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="job_name" value="{{$job->job_name}}"/>
                            @error('job_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        
                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (Comma Separated)
                            </label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{$job->tags}}" name="tags" placeholder="Example: Laravel, Backend, Postgres, etc"/>
                            @error('tags')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2">Company</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" placeholder="Example: Senior Laravel Developer" value="{{$job->company}}" />
                            @error('company')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="city" placeholder="Example: Remote, Boston MA, etc" value="{{$job->city}}"/>
                            @error('city')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                            <input type="text"class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$job->email}}"/>
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="website" class="inline-block text-lg mb-2">Website/Application URL</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" value="{{$job->website}}"/>
                            @error('website')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">Company Logo</label>
                            <input type="file" class="border border-gray-200 rounded p-2 w-full"name="logo"/>
                            @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$job->logo ? asset('storage/'.$job->logo) : asset('images/img.jpg')}}"
                            alt=""
                        />

                        <div class="mb-6">
                            <label for="description" class="inline-block text-lg mb-2">Job Description</label>
                            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"placeholder="Include tasks, requirements, salary, etc">{{$job->description}}</textarea>
                            @error('description')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Update Gig</button>
                                <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </x-card>