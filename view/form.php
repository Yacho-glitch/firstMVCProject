<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-4">Add New Stagiaire</h2>
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="nom" name="nom" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-3 py-3">
            </div>
            <div class="mb-4">
                <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                <input type="number" id="age" name="age" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-3 py-3">
            </div>
            <div class="mb-4">
                <label for="niveau" class="block text-sm font-medium text-gray-700">Niveau</label>
                <input type="text" id="niveau" name="niveau" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-3 py-3">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Stagiaire</button>

            <button type="reset" class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Reset</button>
            
            <?php
                require_once __DIR__ . '/../model/model.php';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nom = $_POST['nom'];
                    $age = $_POST['age'];
                    $niveau = $_POST['niveau'];

                    if (insertStagiaires($nom, $age, $niveau)) {
                        echo "<p class='text-green-500'>Stagiaire added successfully!</p>";

                    
                    } else {
                        echo "<p class='text-red-500'>Error adding stagiaire.</p>";
                    }
                }
            
            ?>
        </div>
    </form>
</body>
</html>