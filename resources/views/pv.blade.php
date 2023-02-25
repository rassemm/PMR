<!DOCTYPE html>
<html>
<head>
    <title>PV de soutenance</title>
</head>
<body>
    <h1>PV de soutenance</h1>
    <p><strong>Date et heure de la soutenance:</strong> {{ $planification->date }}</p>
    <p><strong>Salle de soutenance:</strong> {{ $planification->salle }}</p>
    <p><strong>Titre du projet:</strong> {{ $planification->soutenance->titre }}</p>
    <p><strong>Nom et prénom du président:</strong> {{ $planification->users[0]->nom }} {{ $planification->users[0]->prenom }}</p>
    <p><strong>Nom et prénom du rapporteur:</strong> {{ $planification->users[1]->nom }} {{ $planification->users[1]->prenom }}</p>
    <p><strong>Note:</strong> {{ $note }}</p>
    <p><strong>Mention:</strong> {{ $mention }}</p>
</body>
</html>
