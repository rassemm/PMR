<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Procès-verbal de soutenance</title>
    <header>

    </header>
	<style>
        header {
    background-color: #fff;
    padding: 20px;
    text-align: center;
}

header img {
    width: 100px;
    height: 100px;
}

header h1 {
    margin-top: 10px;
    font-size: 24px;
}

footer {
    background-color: #f2f2f2;
    padding: 10px;
    text-align: center;
}

footer p {
    margin-bottom: 5px;
}

footer p:last-child {
    margin-bottom: 0;
}

		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
		}
		h1 {
			font-size: 24px;
			margin-bottom: 20px;
		}
		h2 {
			font-size: 18px;
			margin-bottom: 10px;
		}
		table {
			border-collapse: collapse;
			margin-top: 20px;
		}
		table td, table th {
			border: 1px solid #000;
			padding: 10px;
		}
		footer {
			position: fixed;
			bottom: 0;
			left: 0;
			right: 0;
			text-align: center;
			font-size: 12px;
			padding: 5px;
			background-color: #f0f0f0;
			border-top: 1px solid #000;
		}
	</style>
</head>
<body>
	<header>
        <img src="chemin/vers/l/image/du/ministere.png" alt="Logo ministère">
        <h1>Nom de l'université</h1>
        <hr>
		<h1>Procès-verbal de soutenance</h1>
		<hr>

	</header>
	<main>
		<h2>Informations sur le projet</h2>
		<table>
			<tbody>
				<tr>
					<th>Titre</th>
					<td>   {{ \App\Models\Soutenance::find($planning->soutenance->id)->project->titre }}</td>
				</tr>
                <tr>
					<th>Etudiant</th>
					<td>    {{ \App\Models\User::find(\App\Models\Project::find($planning->soutenance->project_id)->student)->name }}</td>
				</tr>
                <tr>
					<th>Encadranr</th>
					<td>    {{ \App\Models\User::find(\App\Models\Project::find($planning->soutenance->project_id)->teacher)->name }}</td>
				</tr>
				<tr>
					<th>Description</th>
					<td>{{ $planning->description }}</td>
				</tr>
				<tr>
					<th>société accueillir</th>
					<td> {{ \App\Models\Soutenance::find($planning->soutenance->id)->project->ste }}</td>
				</tr>
                <tr>
					<th>Class</th>
					<td> {{ \App\Models\Soutenance::find($planning->soutenance->id)->project->class }}</td>
				</tr>
			</tbody>
		</table>
		<h2>Informations sur la soutenance</h2>
		<table>
			<tbody>
				<tr>
					<th>Date et heure</th>
					<td> {{ $planning->date}}</td>
				</tr>
				<tr>
					<th>Lieu</th>
					<td>{{ $planning->note }}</td>
				</tr>
				<tr>
					<th>Jury</th>
					<td>
						@foreach ($planning->users as $user)
						{{$user->name }}<br>
						@endforeach
					</td>
				</tr>
			</tbody>
		</table>
	</main>
    <footer>
        <p>Note : {{ $planning->note }} - Mention : {{ $planning->mention }}</p>

            <p>Note : 15/20 - Mention : Très Bien</p>
            <p>{{ now()->format('d/m/Y H:i:s') }}</p>


    </footer>

</body>
</html>
