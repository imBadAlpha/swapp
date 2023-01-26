<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Swapp</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="icon" href="{{ asset('images/Swapp-icon.png') }}" type="image/x-icon">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg viewBox="0 0 525 525" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#EF3B2D">
                            <path d="M 151.88,427.12C 151.88,427.12 162.13,459.38 162.13,459.38
                            162.13,459.38 169.50,459.38 169.50,459.38
                            169.50,459.38 176.88,459.38 176.88,459.38
                            176.88,459.38 179.00,453.12 179.00,453.12
                            180.12,449.62 183.50,439.38 186.38,430.25
                            186.38,430.25 191.62,413.75 191.62,413.75
                            191.62,413.75 197.25,431.50 197.25,431.50
                            200.25,441.38 203.50,451.62 204.25,454.38
                            204.25,454.38 205.75,459.38 205.75,459.38
                            205.75,459.38 213.25,459.75 213.25,459.75
                            213.25,459.75 220.75,460.12 220.75,460.12
                            220.75,460.12 230.62,429.12 230.62,429.12
                            236.00,412.12 240.62,397.38 241.00,396.50
                            241.38,395.38 239.63,395.00 234.63,395.00
                            230.62,395.00 227.25,395.62 226.50,396.50
                            225.88,397.38 222.88,406.88 220.00,417.50
                            217.13,428.12 214.38,438.12 213.88,439.75
                            213.25,441.88 211.38,436.75 206.38,420.12
                            202.75,407.88 199.12,397.12 198.38,396.38
                            196.50,394.50 186.88,394.62 185.25,396.50
                            184.63,397.38 181.00,408.12 177.25,420.38
                            177.25,420.38 170.50,442.50 170.50,442.50
                            170.50,442.50 164.63,420.50 164.63,420.50
                            161.38,408.38 158.12,397.62 157.38,396.75
                            156.50,395.62 153.38,395.00 148.75,395.00
                            148.75,395.00 141.62,395.00 141.62,395.00
                            141.62,395.00 151.88,427.12 151.88,427.12 Z
                            M 413.00,396.38
                            C 410.12,397.75 406.75,400.00 405.50,401.38
                            403.25,403.88 403.25,403.88 401.75,399.75
                            400.50,395.88 400.00,395.62 394.00,395.25
                            394.00,395.25 387.50,394.88 387.50,394.88
                            387.50,394.88 387.50,438.00 387.50,438.00
                            387.50,438.00 387.50,481.25 387.50,481.25
                            387.50,481.25 395.62,481.25 395.62,481.25
                            395.62,481.25 403.75,481.25 403.75,481.25
                            403.75,481.25 403.75,468.12 403.75,468.12
                            403.75,468.12 403.75,454.88 403.75,454.88
                            403.75,454.88 407.38,457.62 407.38,457.62
                            411.88,461.00 420.25,462.00 427.50,460.00
                            434.75,458.12 442.62,450.00 445.50,441.75
                            449.50,429.88 447.50,411.25 441.25,402.50
                            435.38,394.38 422.62,391.50 413.00,396.38 Z
                            M 424.25,407.62
                            C 428.88,409.75 431.25,416.00 431.25,426.12
                            431.25,441.88 425.62,449.50 414.63,448.38
                            404.63,447.50 403.75,445.88 403.75,428.00
                            403.75,412.75 403.75,412.62 407.25,410.25
                            413.25,406.00 418.75,405.12 424.25,407.62 Z
                            M 341.25,395.75
                            C 338.88,396.75 335.38,399.12 333.50,400.88
                            333.50,400.88 330.12,404.12 330.12,404.12
                            330.12,404.12 329.12,399.88 329.12,399.88
                            328.00,395.75 327.75,395.62 321.50,395.25
                            321.50,395.25 315.00,394.88 315.00,394.88
                            315.00,394.88 315.00,438.00 315.00,438.00
                            315.00,438.00 315.00,481.25 315.00,481.25
                            315.00,481.25 323.12,481.25 323.12,481.25
                            323.12,481.25 331.25,481.25 331.25,481.25
                            331.25,481.25 331.25,468.12 331.25,468.12
                            331.25,468.12 331.25,454.88 331.25,454.88
                            331.25,454.88 335.12,457.75 335.12,457.75
                            338.25,460.12 340.62,460.62 347.50,460.62
                            355.00,460.62 356.75,460.12 361.50,456.88
                            364.75,454.50 368.38,450.38 370.62,446.25
                            374.12,439.88 374.38,438.50 374.38,426.25
                            374.38,413.88 374.12,412.75 370.50,406.25
                            364.12,395.12 352.50,390.88 341.25,395.75 Z
                            M 352.38,408.25
                            C 356.62,411.25 358.75,417.50 358.75,426.88
                            358.75,441.88 352.88,449.50 342.12,448.38
                            332.12,447.50 331.25,445.88 331.25,428.00
                            331.25,412.75 331.25,412.62 334.75,410.25
                            341.13,405.75 347.62,405.00 352.38,408.25 Z
                            M 264.38,395.38
                            C 258.38,397.38 253.88,399.62 251.00,402.12
                            249.00,403.88 249.00,404.38 250.75,407.62
                            253.00,412.00 256.75,412.38 263.75,408.75
                            275.25,402.88 285.00,407.75 285.00,419.38
                            285.00,421.88 284.25,422.25 276.25,423.00
                            254.63,425.00 242.63,435.25 246.25,448.62
                            249.50,461.00 266.88,465.25 279.38,456.75
                            285.50,452.62 286.00,452.62 287.88,456.25
                            289.12,458.75 290.50,459.50 294.75,459.75
                            294.75,459.75 300.12,460.12 300.12,460.12
                            300.12,460.12 299.75,435.38 299.75,435.38
                            299.38,407.25 298.38,403.50 289.88,397.88
                            284.12,394.00 272.00,392.88 264.38,395.38 Z
                            M 285.00,438.00
                            C 285.00,442.88 284.50,444.00 281.12,446.38
                            278.88,447.88 274.62,449.38 271.25,449.75
                            266.38,450.12 264.75,449.75 262.62,447.62
                            259.25,444.25 259.25,442.12 262.88,438.25
                            266.00,434.75 271.75,432.75 279.75,432.62
                            279.75,432.62 285.00,432.50 285.00,432.50
                            285.00,432.50 285.00,438.00 285.00,438.00 Z
                            M 100.00,367.38
                            C 84.75,372.38 76.88,384.50 79.75,398.50
                            82.25,410.50 88.12,415.38 107.12,421.12
                            117.63,424.25 121.25,427.88 121.25,435.00
                            121.25,447.50 105.25,451.50 90.88,442.50
                            87.63,440.50 84.25,438.75 83.62,438.75
                            83.00,438.75 80.75,441.12 78.62,444.00
                            78.62,444.00 74.88,449.38 74.88,449.38
                            74.88,449.38 77.75,451.75 77.75,451.75
                            82.88,456.00 93.12,460.00 101.00,460.75
                            120.62,462.88 135.25,452.25 137.12,434.50
                            138.62,420.12 132.00,411.62 115.25,406.12
                            99.13,400.88 95.00,397.75 95.00,390.75
                            95.00,385.25 99.88,381.00 107.25,380.25
                            112.50,379.75 115.00,380.25 120.62,383.12
                            124.50,385.00 128.38,386.12 129.38,385.75
                            130.38,385.38 132.25,383.12 133.38,380.75
                            135.88,375.50 134.88,373.88 126.75,370.00
                            120.88,367.12 105.38,365.50 100.00,367.38 Z
                            M 356.00,222.25
                            C 343.25,235.12 342.50,236.12 342.50,241.00
                            342.50,250.50 353.12,255.62 360.62,249.75
                            360.62,249.75 364.12,247.00 364.12,247.00
                            364.12,247.00 363.50,264.00 363.50,264.00
                            363.00,279.25 362.62,281.62 359.50,288.00
                            355.50,296.12 348.00,302.88 338.75,306.38
                            333.75,308.25 329.25,308.75 316.12,308.75
                            294.75,308.75 291.25,310.38 291.25,320.50
                            291.25,323.25 292.25,325.50 294.50,327.62
                            297.62,330.50 298.25,330.62 317.38,330.50
                            340.62,330.37 349.12,328.12 361.25,319.25
                            378.88,306.25 386.13,288.75 386.25,258.25
                            386.25,258.25 386.25,247.12 386.25,247.12
                            386.25,247.12 388.75,249.38 388.75,249.38
                            395.12,255.12 405.50,250.25 407.13,240.88
                            407.88,236.25 407.62,235.88 394.12,222.50
                            380.88,209.25 380.25,208.75 375.00,208.75
                            369.88,208.75 369.12,209.25 356.00,222.25 Z
                            M 122.00,203.25
                            C 122.00,203.25 118.75,206.62 118.75,206.62
                            118.75,206.62 118.75,265.25 118.75,265.25
                            118.75,265.25 118.75,323.88 118.75,323.88
                            118.75,323.88 121.75,326.88 121.75,326.88
                            123.38,328.50 126.63,330.12 128.88,330.62
                            131.25,331.00 157.75,331.25 187.75,331.00
                            187.75,331.00 242.50,330.62 242.50,330.62
                            242.50,330.62 245.88,327.12 245.88,327.12
                            245.88,327.12 249.38,323.75 249.38,323.75
                            249.38,323.75 249.75,292.75 249.75,292.75
                            250.00,275.75 249.75,260.00 249.38,257.62
                            247.25,246.50 234.12,243.75 229.00,253.38
                            228.00,255.12 227.50,264.62 227.50,281.75
                            227.50,281.75 227.50,307.50 227.50,307.50
                            227.50,307.50 184.38,307.50 184.38,307.50
                            184.38,307.50 141.25,307.50 141.25,307.50
                            141.25,307.50 141.25,265.00 141.25,265.00
                            141.25,265.00 141.25,222.62 141.25,222.62
                            141.25,222.62 191.88,222.25 191.88,222.25
                            191.88,222.25 242.50,221.88 242.50,221.88
                            242.50,221.88 245.50,218.75 245.50,218.75
                            250.25,213.88 250.25,207.62 245.62,203.12
                            245.62,203.12 242.63,200.00 242.63,200.00
                            242.63,200.00 184.00,200.00 184.00,200.00
                            184.00,200.00 125.38,200.00 125.38,200.00
                            125.38,200.00 122.00,203.25 122.00,203.25 Z
                            M 279.75,45.75
                            C 274.00,48.87 273.62,52.87 274.00,112.50
                            274.00,112.50 274.38,167.50 274.38,167.50
                            274.38,167.50 277.88,170.88 277.88,170.88
                            277.88,170.88 281.25,174.38 281.25,174.38
                            281.25,174.38 340.00,174.38 340.00,174.38
                            340.00,174.38 398.75,174.38 398.75,174.38
                            398.75,174.38 402.13,170.88 402.13,170.88
                            402.13,170.88 405.62,167.50 405.62,167.50
                            405.62,167.50 405.62,133.87 405.62,133.87
                            405.62,97.37 405.25,95.25 398.63,92.50
                            394.25,90.62 389.63,91.62 386.25,95.25
                            383.88,97.75 383.75,99.62 383.75,125.25
                            383.75,125.25 383.75,152.50 383.75,152.50
                            383.75,152.50 340.00,152.50 340.00,152.50
                            340.00,152.50 296.25,152.50 296.25,152.50
                            296.25,152.50 296.25,108.62 296.25,108.62
                            296.25,108.62 296.25,64.62 296.25,64.62
                            296.25,64.62 343.50,65.62 343.50,65.62
                            395.88,66.62 399.88,66.25 403.12,60.00
                            404.12,58.00 405.00,55.50 405.00,54.50
                            405.00,50.62 402.00,46.37 398.38,45.00
                            396.00,44.25 374.75,43.75 338.88,43.75
                            292.25,43.87 282.62,44.12 279.75,45.75 Z
                            M 184.50,44.50
                            C 173.75,47.12 163.50,53.12 155.88,61.12
                            143.38,74.25 138.75,87.50 138.75,111.12
                            138.75,111.12 138.75,125.25 138.75,125.25
                            138.75,125.25 135.62,123.25 135.62,123.25
                            128.75,118.75 120.13,122.12 118.12,130.12
                            116.88,135.12 119.75,139.38 133.50,152.75
                            144.62,163.75 146.38,165.00 150.50,165.00
                            154.62,165.00 156.38,163.75 167.75,152.75
                            182.38,138.62 184.75,134.50 181.88,128.25
                            178.88,121.88 171.62,119.38 166.75,123.12
                            165.50,124.12 163.88,125.00 163.38,125.00
                            162.75,125.00 162.50,117.25 162.75,107.75
                            163.25,88.50 164.75,84.00 173.50,75.25
                            181.75,67.00 185.62,65.75 207.88,65.00
                            227.75,64.38 227.75,64.38 230.75,60.87
                            234.88,56.12 234.75,50.12 230.50,46.12
                            227.50,43.25 226.50,43.12 209.63,42.87
                            197.50,42.75 189.50,43.25 184.50,44.50 Z"/>

                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
