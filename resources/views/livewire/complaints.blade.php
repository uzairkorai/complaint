<x-app-layout>
    <main class="overflow-x-hidden overflow-y-auto ">
        {{-- <div class=" mx-auto px-6 py-8">
            <div class="card-header">
                <h3 class="text-gray-700 text-3xl font-medium">Complaints</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th scope="col" sortable>Id</th>
                                <th scope="col" sortable>Name
                                </th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact no</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($complaints as $complaint)
                            <tbody id="myTable">
                                <tr>
                                    <td>{{ $complaint['id'] }}</td>
                                    <td>{{ $complaint['name'] }}</td>
                                    <td>{{ $complaint['email'] }}</td>
                                    <td>{{ $complaint['phone_number'] }}</td>
                                    <td>{{ $complaint['created_at'] }}</td>
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
        </div> --}}
        {{-- @if ($complaints->comp_type == Bootcamp)
        <a class="btn btn-sm btn-success">Resolve</a>
    @elseif($complaints->comp_type == incubator)
        <a class="btn btn-sm btn-danger">Pending</a>
    @endif --}}
        <div class="mx-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex-col space-y-4 ">

                <div class="mt-4">
                    <div class="align-middle min-w-full overflow-x-auto shadow  sm:rounded-lg">

                        <table class="min-w-full divide-y divide-cool-gray-200">
                            <thead>
                                <tr class="bg-dark text-white cursor-pointer">
                                    <th onclick="sortBy()"
                                        class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking">
                                        Id
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking">
                                        Name
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking">
                                        Email
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking">
                                        Contact no
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking">
                                        Departments
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking">
                                        Priority
                                    </th>

                                    <th
                                        class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking">
                                        Created at

                                    </th>
                                    @if (Auth::user()->hasRole('admin'))
                                        <th
                                            class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking">
                                            Assign
                                        </th>
                                        <th
                                            class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking">
                                            Status

                                        </th>
                                    @endif

                                    <th
                                        class="px-6 py-3 bg-cool-gray-50 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking">
                                        Action
                                    </th>
                                </tr>

                            </thead>
                            @foreach ($complaints as $complaint)
                                <tbody class="bg-white divide-y divide-cool-gray-200">
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                            {{ $complaint['id'] }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                            {{ $complaint['name'] }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                            {{ $complaint['email'] }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                            {{ $complaint['phone_number'] }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                            {{ $complaint['comp_type'] }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                            @if ($complaint->priority == 1)
                                                <a class="btn btn-sm btn-danger">Very High</a>
                                            @elseif($complaint->priority == 0)
                                                <a class="btn btn-sm btn-success">Average</a>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                            {{ $complaint->created_at->format('M,d,Y') }}</td>
                                        @if (Auth::user()->hasRole('admin'))
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                                <ul class="row space-x-1">
                                                    <li  value="incubator"><a style="text-decoration: none" href="/sent">incubator</a></li>
                                                    <li  value="Bootcamp"><a style="text-decoration: none" href="/sent">Bootcamp</a></li>
                                                    <li  value="CSR"><a style="text-decoration: none" href="/sent">CSR</a></li>
                                                </ul>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                                @if ($complaint->status == 1)
                                                    <a class="btn btn-sm btn-success">Resolve</a>
                                                @elseif($complaint->status == 0)
                                                    <a href="{{ url('change-status/' . $complaint->id) }}"
                                                        class="btn btn-sm btn-danger">Pending</a>
                                                @endif
                                            </td>
                                        @endif
                                        @if (Auth::user()->hasRole('admin'))
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                                <a class="btn btn-sm btn-primary" style="text-decoration: none"
                                                    href="{{ url('view/' . $complaint->id) }}">View</a>
                                            </td>
                                        @elseif(Auth::user()->hasRole(['csr', 'bootcamp', 'incubator']))
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-cool-gray-900">
                                                <a class="btn btn-sm btn-primary" style="text-decoration: none"
                                                    href="{{ url('views/' . $complaint->id) }}">View</a>
                                            </td>
                                        @endif

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>


                    </div>
                </div>
                <div>
                    {{ $complaints->links() }}
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
