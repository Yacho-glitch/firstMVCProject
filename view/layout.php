<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <?php include_once 'header.php'; ?>
    <br>
    <main>
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-4">List stagiaires</h2>
            <!-- Main content goes here -->
             <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-2 py-3">ID</th>
                        <th class="px-2 py-3">Nom</th>
                        <th class="px-2 py-3">Age</th>
                        <th class="px-2 py-3">Niveau</th>
                        <th class="px-2 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once __DIR__ . '/../model/model.php';

                    if (isset($_GET['delete_id'])) {
                        deleteStagiaires($_GET['delete_id']);
                        header("Location: layout.php");
                        exit();
                        // $stagiaires = array_filter($stagiaires, function($stagiaire) use ($id) {
                            //     return $stagiaire['id'] == $id;
                            // });
                    }
                        
                    $stagiaires = selectStagiaires();
                    foreach($stagiaires as $stagiaire){
                        echo "
                        <tr class='hover:bg-gray-50 text-center'>
                            <td class='px-2 py-3'>{$stagiaire['id']}</td>
                            <td class='px-2 py-3'>{$stagiaire['nom']}</td>
                            <td class='px-2 py-3'>{$stagiaire['age']}</td>
                            <td class='px-2 py-3'>{$stagiaire['niveau']}</td>
                            <td>
                                <a href='update.php?id={$stagiaire['id']}' class='p-2 bg-sky-600 text-white rounded-md hover:bg-blue-700'>Update</a>
                                <a href='../model/model.php?delete_id={$stagiaire['id']}' class='p-2 bg-red-600 text-white rounded-md hover:bg-red-700'>Delete</a>
                            </td>
                        </tr>
                    ";
                }
                ?>
                </tbody>
             </table>
        </div>
    </main>
</body>
</html>