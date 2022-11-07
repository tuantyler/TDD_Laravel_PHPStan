**TDD trong Laravel**

**Test Driven Development (TDD)** là một phương pháp phát triển phần
mềm, thay vì viết code sau đó viết test case để kiểm thử **(Test Last
Development)** . Ta làm theo hướng ngược lại, viết các test case để kiểm
thử trước , sau đó viết code để thỏa mãn các test case đó. **(Test First
Development)**

I.  **Cách thực hiện TDD**

1.  **Viết một test case ( màu đỏ )**

*Viết code cần và (vừa)đủ để làm sao pass được test case vừa viết*

*Nghĩ về một tính năng và viết test case cho nó, vì tính năng này chưa
được implement, test case này chắc chắn sẽ fail*

2.  **Sửa code cho test pass ( màu xanh )**

*Viết code cần và (vừa)đủ để làm sao pass được test case vừa viết*

3.  **Loại bỏ code dư thừa, cải thiện code (Refactor)**

*Vì ở bước 2 ta chỉ viết cho (vừa)đủ để pass test case , sau khi
implement đầy đủ các tính năng thì giờ đã đến lúc để nghĩ đến việc
refactoring code làm sao cho dễ đọc, dễ hiểu hoặc làm sao cho nó có hiệu
năng tốt hơn*

TDD trong Laravel
adbeef81a4bf4a308b0e4cfd8c1b2850\\1.png](./images/media/image1.png)

***Thực hiện quy trình trên cho đến khi implement và pass được tất cả
các requirements được đặt ra ⇒ Code được 100% test coverage***

**Xây dựng một website Todolist Laravel đơn giản áp dụng TDD**

**Ở đây ta sẽ xây dựng một app Todolist đơn giản áp dụng quy trình TDD**

Đối với một project laravel mới được tạo, laravel đã được mặc định kèm
sẵn plugin để viết unit test, plugin này có tên là ***phpunit***

TDD trong
Laravel
adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled.png](./images/media/image2.png)

**Cách sử dụng phpunit để chạy unit test ( trên nền CLI )**

Ta sử dụng lệnh: ***vendor/bin/phpunit***

Ta được kết quả như sau:

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
1.png](./images/media/image3.png)

Sở dĩ có 2 tests ở đây là vì trong template của laravel có sẵn 2 file
test làm ví dụ, 2 file này nằm lần lượt ở

***tests\\Unit\\ExampleTest.php***

***tests\\Feature\\ExampleTest.php***

**Xóa cả hai file này bởi vì chúng ta không cần đến chúng**

Để chạy một test unit cụ thể , ta sử dụng thêm thuộc tính
***---fliter*** kèm với ***class name*** hoặc ***method name***, ví dụ:

***vendor/bin/phpunit \--filter ExampleTest***

***vendor/bin/phpunit \--filter test_example***

Ở đây ta sẽ dùng laravel viết một ứng dụng Todolist đơn giản (thêm, xóa
đã làm, set đã làm) nhưng theo hướng TDD

Tạo một file Unit Test mới bằng lệnh : **php artisan make:test
TodoTest**

Giờ ta có file ***tests\\Feature\\TodoTest.php***

Giả sử requirement yêu cầu homepage của app todo của chúng ta nằm ở
route ***todoapp*** , hay ***http://127.0.0.1:8000/todoapp***

Thay vì lao đầu vào viết code tạo route luôn thì thay vào đó ta sẽ viết
test case trước

**Có 2 cách để viết function test**

1.  **Thêm tiền tố test\_ vào trước tên hàm**

Ví dụ hàm test của mình đặt tên là
***app_homepage_accessible_in_todoapp_route*** thì phải thêm tiền tố
***test\_*** vào phía trước

Ta có***: test_app_homepage_accessible_in_todoapp_route***

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
2.png](./images/media/image4.png)

2.  **Dùng test annotation**

Với test annotation thì hàm test của mình sẽ không cần tiền tố
***test\_*** nữa nhưng ta phải để test annotation: ***/\*\* \@test
\*/*** lên trên đầu hàm

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
3.png](./images/media/image5.png)

**Bắt buộc phải dùng 1 trong 2 cách trên , nếu không phpunit sẽ báo *No
tests found ***

Ta chạy test unit vừa mới viết trên

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
4.png](./images/media/image6.png)

Test case ở trên kiểm tra xem route ***todoapp*** có truy cập được không
, nếu truy cập được thì có http status trả về là 200

Ở đây phpunit báo lỗi test failed , ***[cơ mà đây chính xác những gì ta
hướng đến khi viết theo phương pháp TDD]{.underline}*** (bước 1 của TDD
như đã giới thiệu ở trên)

Giờ chúng ta chuyển sang bước 2, viết code để thõa mãn test case ta vừa
viết

**Tạo file resources\\views\\todoapp.blade.php**

**Thêm route vào routes\\web.php**

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
5.png](./images/media/image7.png)

Chạy lại test case, ta thấy test case đã passed, hoàn thành được mục
tiêu test first (**Test Driven Development - TDD**)

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
6.png](./images/media/image8.png)

**TDD có một mô hình test 3 pha (3-phase pattern) gồm:**

**Arrange** ⇒ là function khởi tạo môi trường cần thiết cho quá trình
test

**Act** ⇒ là khi Arrange đã hoàn thành xong công việc , Act chứa những
đoạn code để thực hiện bài test

**Assertion** ⇒ là khi Act đã được chạy, Assertion kiểm tra xem Act có
hoạt động đúng như mong đợi hay không

**Áp dụng mô hình này vào ứng dụng , ta có quy trình sau**

**Arrange** ⇒ seed dữ liệu giả vào database

***[Ta add model của Todo vào trong test class , dù model này chưa được
khởi tạo]{.underline}***

Ta seed dữ liệu giả vào bằng Factory

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
7.png](./images/media/image9.png)

***Ta chạy lại test case***

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
8.png](./images/media/image10.png)

***Test case failed vì model Todo không tồn tại, ta tiến hành tạo model
Todo bằng lệnh***

***php artisan make:model Todo***

***Ta chạy lại test case***

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
9.png](./images/media/image11.png)

***[Test case failed vì TodoFactory không tồn tại]{.underline}***

Lại tiếp tục debug bằng cách tạo class Factory mới bằng lệnh

***php artisan make:factory TodoFactory***

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
10.png](./images/media/image12.png)

***[Test case failed vì database không tồn tại]{.underline}***

Tạo database bằng phpmyadmin, navicat, hoặc bất cứ trình quản lý
database nào bạn có

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
11.png](./images/media/image13.png)

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
12.png](./images/media/image14.png)

***[Test case failed vì database không có table cần
thiết]{.underline}***

**Tạo table bằng laravel migration**

***php artisan make:migration create_todos_table***

Trong ***database\\migrations\\{date-time}\_create_todos_table.php***
thêm các trường cần thiết cho table

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
13.png](./images/media/image15.png)

**Ta tiến hành Migrate database**

***php artisan migrate***

***Lại chạy lại testcase***

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
14.png](./images/media/image16.png)

Test case failed vì factory không có structure cụ thể để seed dummy data
vào database

Vào file : ***database\\factories\\TodoFactory.php***

**Them structure definition cho TodoFactory**

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
15.png](./images/media/image17.png)

***Test case passed***

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
16.png](./images/media/image18.png){width="6.286836176727909in"
height="1.8768536745406823in"}TDD
trong Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
17.png](./images/media/image19.png)

***Database đã được seed dummy data , hoàn thành Arrange parse***

2\. **Act** ⇒ redirect về route todoapp

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
18.png](./images/media/image20.png)

3.  **Assertion** ⇒ Kiểm tra xem các todo trong database đã được pass
    trong view hay chưa

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
19.png](./images/media/image21.png)

***[Test case thông báo failed , không tìm thấy object được pass trong
view]{.underline}***

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
20.png](./images/media/image22.png)

***[Tiến hành debug web.php , pass object todos sang
views]{.underline}***

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
21.png](./images/media/image23.png)

***[Chạy lại test case , ta thấy test case đã passed]{.underline}***

TDD trong
Laravel adbeef81a4bf4a308b0e4cfd8c1b2850\\Untitled
22.png](./images/media/image24.png)

**Tiến tục áp dụng TDD cho tất cả các functions và requirements còn
lại**

**Test-case: Kiểm tra xem có add dữ liệu được vào database không**

![](./images/media/image25.png)

***[Lỗi vì route chưa được tạo]{.underline}***

![](./images/media/image26.png)

***Tạo route để fix lỗi***

![](./images/media/image27.png)

![](./images/media/image28.png)

**Test-case: Kiểm tra xem có thay đổi trạng thái completed của todo
trong database được không**

![](./images/media/image29.png)
![](./images/media/image30.png)

![](./images/media/image31.png)

**Test-case: Kiểm tra xem có xóa được tất cả những todos đã hoàn thành
hay không**

![](./images/media/image32.png)

![](./images/media/image33.png)

![](./images/media/image34.png)

![](./images/media/image35.png)

![](./images/media/image36.png)

**Merge route, controller đã build theo TDD vào UI**

![](./images/media/image37.png)

![](./images/media/image38.png)

**Kết quả: App TodoList được xây dựng theo phương pháp TDD**

![](./images/media/image39.png)

**Reactor Code**

Ta tìm các cách để rút gọn + cải thiện code ***, ví dụ như*** nhét web
route vào controller riêng, \...

![](./images/media/image40.png)

![](./images/media/image41.png)
