1.The browser sends a GET request to index.php.
2.In index.php, the TaskController is instantiated.
3.Since it's a GET request without any specific action, the index() method of the TaskController is called.
4. The index() method retrieves all tasks from the model using the getAllTasks() method and assigns them to the $tasks variable.
5. The task_list.php view is included, and the $tasks variable is passed to the view.
6. The task_list.php view displays the list of tasks, including options to edit or delete each task.
7. If the user clicks the "Add Task" button and submits the form, a POST request is sent to add_task.php.
8. In add_task.php, the addTask() method of the TaskController is triggered since the POST request has an action value of "add".
9. The addTask() method retrieves the title and description from the $_POST superglobal, and it calls the addTask() method of the TaskModel to add the task to the database.
10. After adding the task, the addTask() method redirects the user back to index.php.
11. If the user clicks the "Edit" button for a specific task, the browser sends a GET request to edit_task.php?id=<task_id>.
12. In edit_task.php, the editTask() method of the TaskController is triggered since it's a GET request with an id parameter.
13. The editTask() method retrieves the task details from the model using the getTaskById() method and assigns them to the $task variable.
14. The edit_task.php view is included, and the $task variable is passed to the view.
15. The edit_task.php view displays a form pre-filled with the task details for editing.
16. If the user submits the edit form, a POST request is sent to index.php?action=update.
17. In index.php, the updateTask() method of the TaskController is triggered since it's a POST request with an action value of "update".
18. The updateTask() method retrieves the task ID, title, and description from the $_POST superglobal, and it calls the updateTask() method of the TaskModel to update the task in the database.
19. After updating the task, the updateTask() method redirects the user back to index.php.
20. If the user clicks the "Delete" button for a specific task, the browser sends a GET request to delete_task.php?id=<task_id>.
21. In delete_task.php, the deleteTask() method of the TaskController is triggered since it's a GET request with an id parameter.
22. The deleteTask() method retrieves the task ID from the $_GET superglobal and calls the deleteTask() method of the TaskModel to delete the task from the database.
23. After deleting the task, the deleteTask() method redirects the user back to index.php.
24. The control goes back to step 1, and the cycle continues.
