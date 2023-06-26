<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        @foreach(config('translatable.locales') as $locale)
                        <div class="mt-4">
                            <label for="title_{{ $locale }}">Title ({{ strtoupper($locale) }})</label>

                            <input type="text" name="{{ $locale }}[title]" id="title_{{ $locale }}"
                                   value="{{ old($locale . '.title') }}"
                                   class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="post_text_{{ $locale }}">Full Text ({{ strtoupper($locale) }})</label>

                            <textarea name="{{ $locale }}[post_text]" id="post_text_{{ $locale }}" rows="5"
                                      class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old($locale . '.post_text') }}</textarea>
                        </div>
                        @endforeach
                        <br /><br />
                        <div class="form-group mb-3">
                            <label >Categories</label>
                            <select name="category_id" class="form-select" aria-label="Default select example">
                                @foreach ($categories as $category)
                                    <option selected>Open this select menu</option>
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach              
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="select2Multiple">Tags</label>
                            <select class="select2-multiple form-control" name="tags[]" multiple="multiple"
                              id="select2Multiple">
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach              
                            </select>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                        </form>
                  </div>
                  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                     
                    <script>
                      $(document).ready(function() {
                          // Select2 Multiple
                          $('.select2-multiple').select2({
                              placeholder: "Select",
                              allowClear: true
                          });
                      });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>