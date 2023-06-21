<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h2>LOGIN</h2>
    <form action="{{ url('user/auth') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="login"></td>
            </tr>
        </table>
    </form>
</body>
</html>
