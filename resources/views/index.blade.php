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


    <h4>Visitors by country</h4>
    <ul>
        @foreach($countries as $country)
            <li>
                {{ $country->country }}: {{ $country->country_count }}
            </li>
        @endforeach
    </ul>

    <br><br>

    <footer>
        <p>
            This is a test and I do not have any verification that the calculated decimals are correct or what the limit is for the calculation.
            <br>
            This is done using the <a href="https://en.wikipedia.org/wiki/Bailey%E2%80%93Borwein%E2%80%93Plouffe_formula" target="_blank">BBP</a> formula.
        </p>
    </footer>

</body>
</html>