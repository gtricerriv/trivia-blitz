<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/categories.css') }}" ></head>
    <title>Document</title>
</head>
<body>
    <div class="box">
        <h2 class="text-center text-white">Select Category</h2>
        <select name="" id="categories">
        </select>
        <span id="submit"> <a href="#"></a></span>

    </div>

    <script>
        async function getCategories(){
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            var result; 
            await fetch("http://localhost:8000/api/categories", requestOptions)
                .then((response) => response.json())
                    .then((data) =>{ 
                        result = data.trivia_categories
                        console.log(result)
            select = document.getElementById("categories")
            for(let i = 0; i < result.length; i++){
                let option = document.createElement("option")
                option.class = "option"
                option.value = result[i].id
                option.text = result[i].name
                select.appendChild(option)
            }
            submit = document.getElementById("submit")
            submit.onclick = ()=> {window.location.replace('http://localhost:8000/quest')}
                    });   
            
        }
        getCategories()
    </script>
</body>
</html>