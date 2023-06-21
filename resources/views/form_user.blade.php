<form action="{{ $action }}" method="post">
    @csrf
    <table>
        <tr>
            <td>nama</td>
            <td><input type="text" name="nama" id="nama" value="{{ $user->name }}"></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type="text" name="email" id="email" value="{{ $user->email }}"></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" name="password" id="password" value="{{ $user->password }}"></td>
        </tr>
        <tr>
            <td><input type="submit" value="{{ $tombol }}"></td>
        </tr>
    </table>
    </form>
