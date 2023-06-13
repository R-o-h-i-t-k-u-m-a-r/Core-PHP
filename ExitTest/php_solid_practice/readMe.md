Here I am mentioning the SOLID principles working in this project.

1. Single Responsibility Principle (SRP): Each class (MySQLiPhotoRepository, PhotoService) has a single responsibility, such as handling database operations or business logic related to photos.

2. Open/Closed Principle (OCP): The code is open for extension by using interfaces (IPhotoRepository) and implementing them with different classes (MySQLiPhotoRepository).

3. Liskov Substitution Principle (LSP): The interfaces (IPhotoRepository) allow different implementations (MySQLiPhotoRepository) to be used interchangeably without affecting the correctness of the program.

4. Interface Segregation Principle (ISP): The IPhotoRepository interface defines separate methods for each photo-related operation, allowing clients to depend only on the methods they require.

5. Dependency Inversion Principle (DIP): The PhotoService class depends on the IPhotoRepository interface, not on a concrete implementation, allowing for easy substitution and decoupling.