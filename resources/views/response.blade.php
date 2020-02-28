<!DOCTYPE html>
<html lang='en'><head><meta charset='UTF-8'><title>Mail</title></head><body>
    <table style='width: 100%;'>
        <thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>
            <a href='{$link}'><img src='{$logo}' alt=''></a><br><br>
        </td></tr></thead>
        <tbody>
        <tr><td style='border:none;'><strong>Subject:</strong> A New post is now ready to read in AWN Blog Post</td></tr>
        <tr><td></td></tr>
        <tr><td colspan='2' style='border:none;'><strong>Title:</strong>{{ $data['title'] }}</td></tr>
        <tr><a href="/single_blog/{{$data['id']}}" style="background-color: #4CAF50; /* Green */border: none; color: white;padding: 10px 50px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">Link to blog</h4></a></td></tr>
        </tbody>
    </table>
</body>
</html>