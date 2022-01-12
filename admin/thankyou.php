<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thankyou For Contacting</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body {
            transition: 1s;
            background-color: #E9ECEF;
        }

        .anchor {
            justify-content: center;
            align-items: center;
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            position: relative;
            margin-bottom: 20px;
        }

        .anchor a {
            position: relative;
            top: 20px;
            text-decoration: none;
            text-transform: uppercase;
            font-family: sans-serif;
            padding: 10px;
            color: white;
            font-size: large;
            font: bold;
            margin-bottom: 10px;
            margin-right: 10px;
            margin-left: 10px;
            border: transparent 2px solid;
            border-radius: 10px;
            box-sizing: border-box;
            transition: 0.7s;
            opacity: 0.5;
        }


        .anchor a:hover {
            transition: 0.7s;
            opacity: 0.8;
        }

        .anchor a:nth-child(1) {
            background-color: rgb(18, 165, 18);
        }

        .anchor a:nth-child(2) {
            background-color: rgb(243, 74, 74);
        }

        .anchor a:nth-child(3) {
            background-color: rgb(49, 165, 238);
        }

        .h1 {
            margin-top: 40px;
            font-size: 85px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            justify-content: center;
            align-items: center;
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            position: relative;
        }

        .h1 h1 {
            display: block;
            position: relative;
            top: 150px;
            text-decoration: none;
            text-transform: uppercase;
            font-family: sans-serif;
            padding: 10px;
            color: white;
            font-size: large;
            font: bold;
            margin: 10px;
            border: transparent 2px solid;
            border-radius: 10px;
            box-sizing: border-box;
            transition: 0.7s;
            opacity: 0.5;
        }

        .thankyou #okay {
            display: block;
            color: green;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-style: italic;
            font-size: 30px;
            justify-content: center;
            align-items: center;
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            position: relative;
            margin-bottom: 20px;
        }

        .thankyou #namedrf {
            text-transform: capitalize;
            margin: 0 15px;
            position: relative;
            color: #6c757d;
            font-size: 1.50rem;
            text-align: center;
            font-weight: 300;
            box-sizing: border-box;
            margin-bottom: 0.25rem;
            display: block;
            line-height: 1.5;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", 
            Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", 
            "Segoe UI Symbol", "Noto Color Emoji" 
        }

        .thankyou #namedrf2 {
            text-transform: capitalize;
            margin-left: 15px;
            margin-right: 15px;
            position: relative;
            color: #000000;
            font-size: 1.50rem;
            text-align: center;
            font-weight: 300;
            box-sizing: border-box;
            margin-bottom: 8.25rem;
            display: block;
            line-height: 1.5;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", 
            Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", 
            "Segoe UI Symbol", "Noto Color Emoji" 
        }


        @media (max-width:761px) {
            .h1 {
                font-size: 50px;
            }


            .errorways {
                font-size: 15px;
            }

            .thankyou #okay {
                font-size: 25px;
            }
        }

        @media (max-width:576px) {
            .thankyou #okay {
                font-size: 30px;
            }
        }

        @media (max-width:284px) {
            .anchor {
                margin-bottom: 30px;
            }

            .thankyou .h1 {
                display: none;
            }

            .thankyou #okay {
                margin-top: 30px;
            }

        }
    </style>
</head>

<body>
    <section>
        <div class="thankyou">
            <h1 class="h1">
                Thank You for Contacting Us
            </h1>

            <p id="okay">
                Your message has been sent successfully!
            </p>

            <p id="namedrf">Your Company or Website name</p>

            <div class="anchor">
                <a href="#">Watch Videos</a>
                <a href="#">Back To Home</a>
                <a href="#" target="_blank"
                    rel="noopener noreferrer">Watch On youtube</a>
            </div>
            <p id="namedrf2">We will reply you to your entered Email</p>
        </div>
    </section>
</body>

</html>