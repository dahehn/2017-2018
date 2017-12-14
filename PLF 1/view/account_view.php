<html>
<head></head>
<body>
<form method="post">
    <input type="text" name="owner">
    <br>
    <label>Describe your account :</label><input type="text" name="description" placeholder="optional">
    <br>
    <select>
        <option name="acc" value="g">Girokonto</option>
        <option name="acc" value="k">Kreditkonto</option>
        <option name="acc" value="s">Sparkonto</option>
        <option name="acc" value="d"> Depot</option>
    </select>
    <input type="text" placeholder="Eröffnungsjahr" name="year">
    <input type="text" placeholder="Laufzeit" name="runtime">
    <input type="button" name="save" value="Save">
</form>
</body>
</html>