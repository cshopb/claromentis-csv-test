<?
if (isset($viewData['tableData'])) {
?>
	<div class="row">
		<form
				action="/file/download"
				method="get"
				enctype="multipart/form-data"
		>
			<button
					name="readerType"
					value="csv"
					type="submit"
					class="btn btn-secondary"
			>
				Download CSV
			</button>
		</form>
		<table class="table col-12">
			<tr>
				<th>Category</th>
				<th>Price</th>
				<th>Amount</th>
			</tr>
			<? foreach ($viewData['tableData'] as $category => $row) { ?>
				<tr>
					<td><?= $category ?></td>
					<td><?= $row['price'] ?></td>
					<td><?= $row['amount'] ?></td>
				</tr>
			<? } ?>
		</table>
	</div>
<? } ?>

<form
		action="/file/upload"
		method="post"
		enctype="multipart/form-data"
>
	Select file with data to upload:
	<input
			type="file"
			name="dataFile"
			id="fileToUpload"
			class="btn btn-secondary"
	/>
	<input
			type="submit"
			value="Upload File"
			name="submit"
			class="btn btn-primary"
	/>
</form>