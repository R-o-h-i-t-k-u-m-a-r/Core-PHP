// Step 1: User accesses index.php in the browser.
// Step 2: index.php instantiates the TaskController.
// Step 3: If it's a GET request without any specific action, index() method is called.
    // Step 3.1: Retrieves all tasks using getAllTasks() method.
    // Step 3.2: Includes task_list.php view and passes $tasks variable.
// Step 4: If it's a POST request with action set to "add", addTask() method is called.
    // Step 4.1: Retrieves title and description from $_POST.
    // Step 4.2: Calls addTask() method of TaskModel to add the task to the database.
    // Step 4.3: Redirects back to index.php.
// Step 5: If it's a GET request to edit_task.php?id=<task_id>, editTask() method is called.
    // Step 5.1: Retrieves task details using getTaskById() method.
    // Step 5.2: Includes edit_task.php view and passes $task variable.
// Step 6: If it's a POST request with action set to "update", updateTask() method is called.
    // Step 6.1: Retrieves task ID, title, and description from $_POST.
    // Step 6.2: Calls updateTask() method of TaskModel to update the task in the database.
    // Step 6.3: Redirects back to index.php.
// Step 7: If it's a GET request to delete_task.php?id=<task_id>, deleteTask() method is called.
    // Step 7.1: Retrieves task ID from $_GET.
    // Step 7.2: Calls deleteTask() method of TaskModel to delete the task from the database.
    // Step 7.3: Redirects back to index.php.
// Step 8: Control goes back to step 1, and the cycle continues.
