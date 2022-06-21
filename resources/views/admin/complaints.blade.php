<x-app-layout>
    <main class="overflow-x-hidden overflow-y-auto ">
        <div class=" mx-auto px-6 py-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-gray-700 text-3xl font-medium">Complaints</h3>
                </div>
                <div class="card-body">
                    <table id="dtBasicExample" class="table table-striped table-hover " cellspacing="0" width="100%">
                        <tr style="cursor: pointer" class="thead bg-dark text-white">
                            <th data-column="id" data-order="desc">Id</th>
                            <th data-column="name" data-order="desc">Name
                                <span class="float-right text-sm" style="cursor: pointer">
                                        <i class="fa fa-arrow-up"></i>
                                        <i class="fa fa-arrow-down text-muted"></i>
                                    </span>
                            </th>
                            <th data-column="email" data-order="desc">Email</th>
                            <th data-column="phone_number" data-order="desc">Contact no</th>
                            {{-- <th>Subject</th> --}}
                            <th data-column="created_at" data-order="desc">Created at</th>

                            {{-- <th>File</th> --}}
                            {{-- <th>Description</th> --}}
                            <th data-column="status" data-order="desc">Status</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($complaints as $complaint)
                            <tbody id="myTable">
                                <tr>
                                    <td>{{ $complaint['id'] }}</td>
                                    <td>{{ $complaint['name'] }}</td>
                                    <td>{{ $complaint['email'] }}</td>
                                    {{-- <td>{{ $complaint['subject'] }}</td> --}}
                                    <td>{{ $complaint['phone_number'] }}</td>
                                    <td>{{ $complaint['created_at'] }}</td>
                                    {{-- <td>
                                        <img src="{{ asset($complaint['thumbnail']) }}" alt="" width="50" height="50"
                                            class="img img-responsive">
                                    </td> --}}
                                    {{-- <td>{{ $complaint['body'] }}</td> --}}

                                    <td>
                                        @if ($complaint->status == 1)
                                            <a class="btn btn-sm btn-success">Resolve</a>
                                        @elseif($complaint->status == 0)
                                            <a href="{{ url('change-status/' . $complaint->id) }}"
                                                class="btn btn-sm btn-danger">Pending</a>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-sm btn-primary" style="text-decoration: none"
                                            href="{{ url('view/' . $complaint->id) }}">View Details</a></td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
