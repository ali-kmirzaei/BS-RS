<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
      @include('notifications')
        <form method="post">
                  {{ csrf_field()  }}
          <input type="submit" value="Submit">
        </form>
      </div>

</body>
</html>
<style>

.description {
  font-family: 'Amatic SC', cursive;
  text-align: center;
	font-size: 20px;
}

body{
    background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%);
    height: 1000px ;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  padding-left: 30%;
  padding-right: 30%;

}
label{
    color: white;
}


</style>
