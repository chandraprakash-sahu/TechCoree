<?php

session_start();
include "conn.php";

// ✅ ADD CATEGORY
if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $sql = "INSERT INTO category_tbl (category_name) VALUES ('$category_name')";
    $conn->query($sql);
    echo "<script>alert('✅ Category added!');</script>";
}

// ✅ DELETE CATEGORY
if (isset($_GET['delete'])) {
    $c_id = $_GET['delete'];
    $conn->query("DELETE FROM category_tbl WHERE cate_id='$c_id'");
    echo "<script>alert('❌ Category deleted!');</script>";
}

// ✅ UPDATE CATEGORY
if (isset($_POST['update_category'])) {
    $c_id = $_POST['c_id'];
    $category_name = $_POST['category_name'];
    $conn->query("UPDATE category_tbl SET category_name='$category_name' WHERE cate_id='$c_id'");
    echo "<script>alert('✏️ Category updated!');</script>";
}

// ✅ FETCH ALL CATEGORIES
$result = $conn->query("SELECT * FROM category_tbl ORDER BY cate_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="img/TC logo.png">   
    <title>Manage Categories</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f9;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 8px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            padding: 8px 12px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            background: white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #007bff;
            color: white;
        }
        a {
            text-decoration: none;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>🗂️ Manage Categories</h2>

<!-- ADD NEW CATEGORY -->
<form method="post">
    <input type="text" name="category_name" placeholder="Enter category name" required>
    <button type="submit" name="add_category">Add Category</button>
</form>

<!-- CATEGORY LIST -->
<table>
    <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['cate_id']; ?></td>
        <td><?php echo $row['category_name']; ?></td>
        <td>
            <!-- Edit form -->
            <form method="post" style="display:inline;">
                <input type="hidden" name="c_id" value="<?php echo $row['cate_id']; ?>">
                <input type="text" name="category_name" value="<?php echo $row['category_name']; ?>">
                <button type="submit" name="update_category">Update</button>
            </form>
            <a href="?delete=<?php echo $row['cate_id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
