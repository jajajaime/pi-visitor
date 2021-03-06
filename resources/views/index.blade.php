<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pi Decimals by Visitor</title>

    <style>
        p {
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <h1>Being the {{ $visitor }} visitor, you generated the {{ $visitor }} &pi; (pi) decimal. Thanks!</h1>

    <p>{{ $pi }}</p>

    <br><br>


    <h3>Visitors by country</h3>
    <ul>
        @foreach($countries as $country)
            <li>
                {{ $country->country }}: {{ $country->country_count }}
            </li>
        @endforeach
    </ul>

    <br><br>

    <div>
        <p>
            This is a test and I do not have any verification that the calculated decimals are correct or what the limit is for the calculation.
            <br>
            The source code can be found at <a href="https://github.com/jajajaime/pi-visitor">https://github.com/jajajaime/pi-visitor</a>.
        </p>
    </div>

    {{-- <br><br>

     <div>
        <h4>Changelog</h4>
        <h4>v0.1 (2016-04-30)</h4>
        <ul>
            <li>
                First version.
            </li>
        </ul>
    </div> --}}

</body>
</html>