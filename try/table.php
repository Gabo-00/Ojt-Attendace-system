<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			max-width: 100%;
			overflow-x: auto;
			font-size: 14px;
			font-weight: normal;
			color: #333;
			border: 1px solid #ddd;
		}

		th, td {
			text-align: left;
			padding: 8px;
			font-weight: normal;
			color: #333;
		}

		th {
			background-color: #f2f2f2;
			color: #333;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		@media screen and (max-width: 600px) {
			table {
				border: 0;
			}

			table caption {
				font-size: 1.3em;
			}

			table thead {
				border-bottom: none;
				display: none;
			}

			table tr {
				border-bottom: 3px solid #ddd;
				display: block;
				margin-bottom: 15px;
			}

			table td {
				border-bottom: 1px solid #ddd;
				display: block;
				font-size: 0.8em;
				text-align: right;
			}

			table td:before {
				content: attr(data-label);
				float: left;
				font-weight: bold;
				text-transform: uppercase;
			}

			table td:last-child {
				border-bottom: 0;
			}
		}

		.table-wrapper {
			overflow-x: auto;
		}
	</style>
</head>
<body>
	<div class="table-wrapper">
		<table>
			<caption>Responsive and Scrollable Table</caption>
			<thead>
				<tr>
					<th>Header 1</th>
					<th>Header 2</th>
					<th>Header 3</th>
					<th>Header 4</th>
					<th>Header 5</th>
					<th>Header 6</th>
					<th>Header 7</th>
					<th>Header 8</th>
					<th>Header 9</th>
					<th>Header 10</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td data-label="Header 1">Data 1</td>
					<td data-label="Header 2">Data 2</td>
					<td data-label="Header 3">Data 3</td>
					<td data-label="Header 4">Data 4</td>
					<td data-label="Header 5">Data 5</td>
					<td data-label="Header 6">Data 6</td>
					<td data-label="Header 7">Data 7</td>
					<td data-label="Header 8">Data 8</td>
					<td data-label="Header 9">Data 9</td>
					<td data-label="Header 10">Data 10</td>
				</tr>
				<tr>
					<td data-label="Header 1">Data 11</td>
					<td data-label="Header 2">Data 12</td>
					<td data-label="Header 3">Data3</td>
<td data-label="Header 4">Data 14</td>
<td data-label="Header 5">Data 15</td>
<td data-label="Header 6">Data 16</td>
<td data-label="Header 7">Data 17</td>
<td data-label="Header 8">Data 18</td>
<td data-label="Header 9">Data 19</td>
<td data-label="Header 10">Data 20</td>
</tr>
<tr>
<td data-label="Header 1">Data 21</td>
<td data-label="Header 2">Data 22</td>
<td data-label="Header 3">Data 23</td>
<td data-label="Header 4">Data 24</td>
<td data-label="Header 5">Data 25</td>
<td data-label="Header 6">Data 26</td>
<td data-label="Header 7">Data 27</td>
<td data-label="Header 8">Data 28</td>
<td data-label="Header 9">Data 29</td>
<td data-label="Header 10">Data 30</td>
</tr>
</tbody>
</table>
</div>

</body>
</html>







