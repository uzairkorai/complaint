<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-gray-700 text-3xl font-medium">Complaints</h3>
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Subject</th>
                        <th>File</th>
                        <th>Description</th>
                        <th>Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint['id'] }}</td>
                            <td>{{ $complaint['subject'] }}</td>
                            <td>
                                <img src="{{ asset($complaint['thumbnail']) }}" alt="" width="50" height="50"
                                    class="img img-responsive">
                            </td>
                            <td>{{ $complaint['body'] }}</td>
                            <td>{{ $complaint['phone_number'] }}</td>

                            <td>
                                @if($complaint->status==1)
                                <a class="btn btn-sm btn-success">Resolve</a>
                                @elseif($complaint->status==0)
                                <a href="{{ url('change-status/' .$complaint->id) }}" class="btn btn-sm btn-danger">Pending</a>
                                @endif
                            </td>
                            <td><a href="{{url('view/' .$complaint->id)}}">View</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </main>
    </div>
</x-app-layout>
