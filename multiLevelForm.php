<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #EEEEEE;
        }

        .container {
            text-align: center;
        }

        .container h2 {
            font-size: 2vw;
            font-family: 'Courier New', Courier, monospace;
            margin-bottom: 40px;
            letter-spacing: 1.2px;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 15px;
        }

        form select {
            width: 450px;
            padding: 15px;
            padding-left: 10px;
            background-color: #fff;
            border-radius: 10px;
            border: none;
            outline: none;
            font-size: 1.2rem;
            box-shadow: 0 5px 10px 0 rgb(0, 0, 0, 0.25);
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Multi-Level Dropdowns</h2>
        <p>In this example, we have created a .dropdown-submenu class for multi-level dropdowns (see style section above).</p>
        <p>Note that we have added jQuery to open the multi-level dropdown on click (see script section below).</p>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="#">Ho Chi Minh</a></li>
                <li><a tabindex="-1" href="#">Ha Noi</a></li>
                <li><a tabindex="-1" href="#">Ha Noi</a></li>
                <li><a tabindex="-1" href="#">Ha Noi</a></li>
                <li><a tabindex="-1" href="#">Ha Noi</a></li>
                <li class="dropdown-submenu">
                    <a class="test" tabindex="-1" href="#"> Location <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                        <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                        <li class="dropdown-submenu">
                            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">3rd level dropdown</a></li>
                                <li><a href="#">3rd level dropdown</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <h2>Multi Level Dependent Drop Down</h2>

        <form action="#">
            <select name="" id="country">
                <option value="">-- Select Country --</option>
            </select>
            <select name="" id="state">
                <option value="">-- Select State --</option>
            </select>
            <select name="" id="city">
                <option value="">-- Select City --</option>
            </select>
            <select name="" id="zip">
                <option value="">-- Select Zip --</option>
            </select>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });

        var countrySateCityinfo = {
            Australia: {
                "Western Australia": {
                    Broome: ["6725", "6318", "6701"],
                    Coolgardie: ["6429", "6432"]
                },
                Tasmania: {
                    Hobart: ["7000", "7520"],
                    Launceston: ["7250", "7334"],
                    Burnie: ["7320", "7315"]
                }
            },
            Germany: {
                Bavaria: {
                    Munich: ["80331", "80333", "80335"],
                    Numemberg: ["90402", "90403", "90404"]
                },
                Hessen: {
                    Frankfurt: ["60306", "60309", "60310"],
                    Surat: ["55246", "55247", "55248", "55249"]
                }
            },

            Canada: {
                Alberta: {
                    Calgary: ["8033", "8333", "8035"],
                    Edmonton: ["9040", "9403", "9040"]
                },
                Manitoba: {
                    Brandon: ["6030", "6030"],
                    Winnipeg: ["5524", "5547", "5248"]
                }
            }

        }

        window.onload = function() {
            const selectCountry = document.getElementById('country'),
                selectState = document.getElementById('state'),
                selectCity = document.getElementById('city'),
                selectZip = document.getElementById('zip'),
                selects = document.querySelectorAll('select')
            
            selectState.disabled = true
            selectCity.disabled = true
            selectZip.disabled = true
            console.log(selects)
            selects.forEach(select => {
                console.log(select)
                if (select.disabled == true) {
                    select.style.cursor = "auto"
                } else {
                    select.style.cursor = "pointer"
                }
            })

            for (let country in countrySateCityinfo) {
                // console.log(country);
                selectCountry.options[selectCountry.options.length] = new Option(country, country)
            }


            // country change
            selectCountry.onchange = (e) => {

                selectState.disabled = false
                selectCity.disabled = true
                selectZip.disabled = true

                selects.forEach(select => {
                    if (select.disabled == true) {
                        select.style.cursor = "auto"
                    } else {
                        select.style.cursor = "pointer"
                    }
                })

                selectState.length = 1
                selectCity.length = 1
                selectZip.length = 1

                for (let state in countrySateCityinfo[e.target.value]) {
                    // console.log(state);
                    selectState.options[selectState.options.length] = new Option(state, state)
                }
            }

            // state change
            selectState.onchange = (e) => {
                selectCity.disabled = false
                selectZip.disabled = true

                selects.forEach(select => {
                    if (select.disabled == true) {
                        select.style.cursor = "auto"
                    } else {
                        select.style.cursor = "pointer"
                    }
                })

                selectCity.length = 1
                selectZip.length = 1

                for (let city in countrySateCityinfo[selectCountry.value][e.target.value]) {
                    // console.log(city);
                    selectCity.options[selectCity.options.length] = new Option(city, city)
                }
            }

            // change city
            selectCity.onchange = (e) => {
                selectZip.disabled = false

                selects.forEach(select => {
                    if (select.disabled == true) {
                        select.style.cursor = "auto"
                    } else {
                        select.style.cursor = "pointer"
                    }
                })

                selectZip.length = 1

                let zips = countrySateCityinfo[selectCountry.value][selectState.value][e.target.value]

                for (let i = 0; i < zips.length; i++) {
                    selectZip.options[selectZip.options.length] = new Option(zips[i], zips[i])
                }
            }
        }
    </script>

</body>

</html>