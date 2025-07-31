<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Post Created</title>
</head>
<body style="font-family: 'Segoe UI', sans-serif; background-color: #f9f9f9; padding: 40px 20px; color: #333;">

    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 14px rgba(0,0,0,0.05);">
        <tr>
            <td style="padding: 30px 40px; text-align: center; background-color: #111;">
                <h1 style="color: #fff; font-family: Georgia, serif; margin: 0;">Flourish 🌿</h1>
                <p style="color: #bbb; margin-top: 6px; font-size: 14px;">A space to let your thoughts bloom</p>
            </td>
        </tr>

        <tr>
            <td style="padding: 30px 40px;">
                <h2 style="font-size: 20px; margin-bottom: 10px;">Hello, <span style="color: #bfa46f;">{{ $user->username }}</span> 👋</h2>

                <p style="margin-bottom: 20px; font-size: 16px; line-height: 1.6;">
                    Congratulations! You've just published a new post on Flourish.
                </p>

                <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 18px; color: #111111; margin-bottom: 5px;">{{ $post->title }}</h3>
                    <p style="font-size: 15px; color: #555; line-height: 1.6;">{{ $post->body }}</p>
                </div>

                @if ($post->image)
                    <div style="margin: 30px 0; text-align: center;">
                        <img src="{{ $message->embed('storage/' . $post->image) }}" alt="Post Cover Image" style="max-width: 100%; border-radius: 8px;">
                    </div>
                @endif

                <p style="font-size: 14px; color: #999; text-align: center; margin-top: 40px;">
                    Keep writing, keep reflecting — let your words flourish ✨
                </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px 40px; background-color: #f3f3f3; text-align: center; font-size: 12px; color: #888;">
                &copy; {{ date('Y') }} Flourish Blog. All rights reserved.
            </td>
        </tr>
    </table>

</body>
</html>
