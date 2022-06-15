<x-app-layout>

    <div class="bg-gray-400"></div>
    <main class=""
        style="margin-top: 0; padding: 0px 20px; padding-top: 40px;padding-bottom: 10px;  margin-bottom:40px;">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="container mx-auto px-6 py-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-gray-700 mb-3 text-3xl font-medium">Complaints</h2>
                            </div>

                            <div class="flex col-md-6 mb-2">
                                <label for="">Subject: </label>
                                <span class="pl-14"></span>
                                <p>{{ $complaints->name }}</p>
                            </div>

                            <div class="flex col-md-6">
                                <label for="">Subject: </label>
                                <span class="pl-10"></span>
                                <p>{{ $complaints->subject }}</p>
                            </div>

                            <div class="flex col-md-6">
                                <label for="">Description:</label>
                                <span class="pl-7"></span>
                                <p>{{ $complaints->body }}</p>
                            </div>
                            @if (Auth::user()->hasRole('admin'))
                                <div>
                                    <form method="POST" action="/view">
                                        @csrf

                                        <div class="flex mt-6">
                                            {{-- <h2 class="mb-2">Complaint a Reply</h2> --}}
                                            <div>
                                                <img style="border-radius: 100%" width="40" height="40"
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVe0cFaZ9e5Hm9X-tdWRLSvoZqg2bjemBABA&usqp=CAU"
                                                alt="">
                                            </div>
                                            <div  class="form-group" style="background: #F3F3F4;
                                        border-radius: 6px;
                                        border: none;
                                        width: 100%;
                                        margin-left: 15px;">
                                                <textarea name="message" class="form-control"
                                                    style="width: 100%;background: transparent;border: none;outline: none;resize: none;font-size: 12px;line-height: 20px;color: #212945;"
                                                    placeholder="Reply" rows="5" id="message" required></textarea>

                                                @error('message')
                                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="flex justify-end mt-4 pt-4 ">
                                            <button type="submit"
                                                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-xl hover:bg-blue-600">Reply</button>
                                        </div>
                                    </form>
                                    <div>
                                        @if (isset($comments))
                                            @foreach ($comments as $comment)
                                                <div class="flex col-md-6 mb-4">
                                                    <img style="border-radius: 50%" width="40" height="40"
                                                        src="https://images.unsplash.com/photo-1654378550363-f413d9686919?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
                                                        alt="">
                                                    <span class="ml-2"></span>
                                                    {{ Auth::user()->name }} <br>
                                                </div>
                                                <p class="mb-3">{{ $comment->message }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
</x-app-layout>
