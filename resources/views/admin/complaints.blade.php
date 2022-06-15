<x-app-layout>
        <main class="overflow-x-hidden overflow-y-auto ">
            <div class=" mx-auto px-6 py-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-gray-700 text-3xl font-medium">Complaints</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr class="thead bg-dark text-white">
                                <th>Id</th>
                                <th>Subject</th>
                                <th>File</th>
                                <th>Description</th>
                                <th>Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($complaints as $complaint)
                                <tr class="">
                                    <td>{{ $complaint['id'] }}</td>
                                    <td>{{ $complaint['subject'] }}</td>
                                    <td>
                                        <img src="{{ asset($complaint['thumbnail']) }}" alt="" width="50" height="50"
                                            class="img img-responsive">
                                    </td>
                                    <td>{{ $complaint['body'] }}</td>
                                    <td>{{ $complaint['phone_number'] }}</td>

                                    <td>
                                        @if ($complaint->status == 1)
                                            <a class="btn btn-sm btn-success">Resolve</a>
                                        @elseif($complaint->status == 0)
                                            <a href="{{ url('change-status/' . $complaint->id) }}"
                                                class="btn btn-sm btn-danger">Pending</a>
                                        @endif
                                    </td>
                                    <td><a href="{{ url('view/' . $complaint->id) }}">View</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </main>
</x-app-layout>
