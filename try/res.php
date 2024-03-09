<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.table-wrapper {
  max-width: 150%;
  overflow-x: auto;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

thead th {
  background-color: #f2f2f2;
  position: sticky;
  top: 0;
}

tbody {
  height: 200px;
  overflow-y: auto;
}

	</style>
</head>
<body>
<div class="table-wrapper">
  <table>
    <thead>
      <tr>
        <th>Column 1</th>
        <th>Column 2</th>
        <th>Column 3</th>
        <th>Column 4</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Data 1</td>
        <td>Data 2</td>
        <td>Data 3</td>
        <td>Data 4</td>
      </tr>
      <tr>
        <td>Data 5</td>
        <td>Data 6</td>
        <td>Data 7</td>
        <td>Data 8</td>
      </tr>
      <tr>
        <td>Data 9</td>
        <td>Data 10</td>
        <td>Data 11</td>
        <td>Data 12</td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>