Here's an overview of how SOLID principles are applied in the photo gallery project:

1. Single Responsibility Principle (SRP):

     . PhotoController has the responsibility of handling HTTP requests and directing them to the      appropriate methods in PhotoService.
     . MySQLiPhotoRepository is responsible for interacting with the database to perform CRUD operations on photos.
     . PhotoService contains the business logic for handling photo operations.

2. Open/Closed Principle (OCP):

     . The code is open for extension through the use of interfaces (PhotoRepositoryInterface) and allows for different implementations (MySQLiPhotoRepository) without modifying the existing code.


3. Liskov Substitution Principle (LSP):

     . The PhotoRepositoryInterface allows different implementations (such as MySQLiPhotoRepository) to be used interchangeably without affecting the correctness of the code.


4. Interface Segregation Principle (ISP):

      . PhotoRepositoryInterface defines separate methods for each photo-related operation, allowing clients to depend only on the methods they require.

5. Dependency Inversion Principle (DIP):

      . PhotoController depends on PhotoService through composition, allowing for easy substitution of the service implementation.
      .PhotoService depends on PhotoRepositoryInterface, allowing for different repository implementations to be used interchangeably.