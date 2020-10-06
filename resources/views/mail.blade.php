
<head>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Styles required by this views -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
Hi <strong>Admin</strong>,

The following is the problematic data, the source data is not in accordance with the master data. please check again
<div class="card-body">
    <table class="table table-responsive-sm table-bordered table-striped table-sm">
        <thead>

        <tr>

            <th>Company Name</th>
            <th>Address</th>
            <th>Source</th>



        </tr>
        </thead>
        <tbody>

            <tr>
                @foreach((array)$company_name as $name)
                <td>{{ $name }}</td>@endforeach
                @foreach((array)$address as $dr)
                <td>{{ $dr }}</td>@endforeach
                    @foreach((array)$data_source as $source)
                        <td>{{ $source }}</td>@endforeach




            </tr>


        </tbody>
    </table>
</div>
Thank You
<p></p>
