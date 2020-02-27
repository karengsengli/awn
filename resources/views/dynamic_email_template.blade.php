<!-- <p>Hi, This is {{ $data['name'] }}</p>
<p>I have some query like {{ $data['message'] }}.</p>
<p>It would be appriciative, if you gone through this feedback.</p> -->
<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Mail</title></head><body>
<table style='width: 100%;'>
<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>
<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>
</td></tr></thead><tbody><tr>
<td style='border:none;'><strong>Name:</strong> {{ $data['name'] }}</td>
<td style='border:none;'><strong>Email:</strong> {{ $data['email'] }}</td>
</tr>
<tr><td style='border:none;'><strong>Subject:</strong> {{ $data['subject'] }}</td></tr>
<tr><td></td></tr>
<tr><td colspan='2' style='border:none;'><strong>Messsage:</strong>{{ $data['message'] }}</td></tr>
</tbody></table>
</body></html>