<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" media="All" href="{{ public_path('css/main2.css'); }}">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<style>

    *{margin: 0px;padding: 0px;}

    .logo img{display:block;margin: 30px auto;}
    #head{text-align:left;margin-bottom: 30px}
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-size:17px;

    }
    table th {padding: 0px 15px 0px}
    .eng-table table td{font-size: 15px;letter-spacing: 1px;padding:0px 15px 0px;}
    .language-table table td{font-size: 15px;letter-spacing: 1px;padding:0px 15px 0px;}
    .eng-table{margin-bottom: 30px;}
    .language-table{margin-bottom:30px}
    .contact-sec li{list-style: disc;}

</style>

</head>

<body id="body">

    <div class="logo">
        <img id ="logo-heading "src="{{asset('images/logo.png')}}" alt="not found">
    </div>

    <h3 id="head">Patient Name :  {{auth()->user()->first_name}}</h3>
    <h5 id="head">Date :  {{$record->created_at->format('d/m/Y')}}</h5>
    <div class="eng-table">
        <table>
            <tr>
                <th>Category English</th>
                <th>Pain Type English</th>
                <th>Severity English</th>
            </tr>
            <tr>
                <td>{{ ucfirst($record->pains->english) }}</td>
                <td>{{ ucfirst($record->painTypes->english) }}</td>
                <td>{{ ucfirst($record->severity->english) }}</td>
            </tr>
        </table>
    </div>

    @if($language!='english')

    <div class="language-table">
        <table>
            <tr>
                <th>Category ({{$language}})</th>
                <th>Pain Type ({{$language}})</th>
                <th>Severity ({{$language}})</th>
            </tr>

            <tr>
                <td>{{ ucfirst($record->pains->$language) }}</td>
                <td>{{ ucfirst($record->painTypes->$language) }}</td>
                <td>{{ ucfirst($record->severity->$language) }}</td>
            </tr>
        </table>
    </div>
    @endif

    <div class="contact-sec">
        <ul>
        <h4>For More Information:</h4>
            <li>Contact us:9989876154</li>
            <li>Visit us: <a href="http://cipdar.clickysoft.us">cipdar.clickysoft.us</a></li>
        </ul>
    </div>
    <div id="avatar">

        <img src="{{asset('images/'.$body_part.'.png')}}" alt="not found">

      {{-- <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('images').'/'.$record->avatar.'.png'))}}"/> --}}

    </div>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" type="text/javascript"></script>

    <script src="{{asset('js/main.js')}}"></script>

</body>


</html>

