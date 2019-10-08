<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>インス○もどき→ユーザー情報</title>
    <link rel="icon" href="{{ asset('fuca_tehepero_icon_32x32.ico') }}" sizes="32x32">
</head>
<body>
    @foreach ($users as $user)
        ユーザーID： {{ $user->id }}<br>
        メールアドレス： {{ $user->email }}<br>
        <span style="font-size: 16px; font-weight: bold;">{{ $user->name }}さん</span><br>
        <hr>
    @endforeach

</body>
</html>                                                                                                                     