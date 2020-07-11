

const list = [
    { nameFilm: "Phân Khu 9", image: "imgs/phankhu9.jpg", content: "Không có nhiều người biết về cõi âm, một thế giới tâm linh nhiều điều kỳ lạ mà khoa học không thể giải thích.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Đảo Cá Sấu", image: "imgs/daocasau.jpg", content: "Mặc dù chỉ là một webmovie được chiếu trực tuyến tại thị trường Trung Quốc nhưng Crocodile Island nhận được khá nhiều lời khen từ phía khán giả", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Hồ Vĩ", image: "imgs/hovi.jpg", content: "Tại New York, Phẩm Thụy (Mã Thái) nhớ về tình yêu năm xưa và thời điểm ông rời Đài Loan – nơi mà nhiều năm sau đó, ông đã cùng cô con gái Angela trở về.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Liệt Hỏa Tinh Anh", image: "imgs/lhtinhanh.jpg", content: "Một cuộc đấu giá trang sức tư nhân cao cấp đã thu hút hai nhóm cướp, một nhóm là những kẻ cướp mộ Cố Lão Căn và Ngô Đắc Phạm, và nhóm còn lại là những tên cướp quốc tế David và Amy.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Người Kề Bên Gối", image: "imgs/nkbengoi.jpg", content: "Cô gái thành phố xinh đẹp Thẩm Diệc Trinh hăm hở bắt đầu cuộc sống riêng trong một căn nhà thuê, liền gặp phải một sự kiện vừa ly kỳ vừa đáng sợ.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Đạo Sĩ Trừ Yêu", image: "imgs/dstruyeu.jpg", content: "Mặc dù chỉ là webmovie không được đầu tư quá nhiều kinh phí của điện ảnh hoa ngữ nhưng Cyan Wizard được đánh giá khá cao và nhận những lời khen có cánh từ khán giả.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Hỏa Vân Tà Thần", image: "imgs/hvtanhan.jpg", content: "Sự phát triển mạnh mẽ của dòng phim chiếu mạng tại thị trường điện ảnh hoa ngữ chính là cơ hội để nhiều diễn viên thất sủng tìm được cơ hội cho bản thân mình.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Đại Ngư", image: "imgs/daingu.jpg", content: "Bộ phim kể về anh chàng ngư dân Trần Tử Hào tình cờ gặp cô gái trẻ Tiểu Nghệ, hai người nảy sinh tình cảm với nhau.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Niên Thú", image: "imgs/nienthu.jpg", content: "Hương vị ngày tết ở Hồ gia trang dần trở nên nhạt nhoà, nóng lạnh bất thường. La Xuyên là một thiếu niên múa lân có tính cách sôi nổi, mơ ước phát triển nghệ thuật múa lân lên một tầm cao mới.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Bào Chữa Vô Tội", image: "imgs/bcvotoi.jpg", content: "Vạn Văn Phương bị ám sát ở Hồng Kông. Cuộc điều tra cho thấy nghi phạm là một thanh niên. Luật sư Đoan Mộc Lan tiếp quản vụ án để bắt đầu cuộc điều tra của cô.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Lửa Trời", image: "imgs/luatroi.jpg", content: "Đậu Kiêu là cái tên không còn xa lạ gì với khán giả yêu thích phim hoa ngữ, anh nổi tiếng từ khá sớm và liên tục được đóng chính trong các dự án truyền hình đình đám của Trung Quốc.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Lạc Hồn", image: "imgs/lachon.jpg", content: "Lạc Hồn là chuyến hành trình đi ngược quá khứ của hồn ma Hye-jung - cô gái trẻ chết một cách bí ẩn. Từng sống một cuộc đời cô độc và tẻ nhạt, Hye-jung cắt đứt liên lạc với gia đình,", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "7 Ngày Yêu", image: "imgs/7ngayyeu.jpg", content: "Không chỉ là một câu chuyện tình yêu cảm động, ý nghĩa mà 7 Days còn mang nhiều thông điệp tốt đẹp đến cho khán giả, đặc biệt là những ai đang ở độ tuổi trưởng thành trong tình yêu.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Nụ Hồn Đầu", image: "imgs/nuhondau.jpg", content: "Nếu khán giả nào yêu thích phim ngôn tình thì chắc hẳn đều biết đến bộ phim truyền hình Thơ Ngây, một giai điệu lãng mạn, ấm áp của điện ảnh Đài Loan cách đây hơn chục năm.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Sủng Ái", image: "imgs/sungai.jpg", content: "Trong thời gian gần đây, Chung Hán Lương hiếm khi xuất hiện trên màn ảnh nhỏ, nhưng vẫn nhận được sự yêu mến đặc biệt từ khán giả.", rating: 5, Category: "Phim Ngắn"  },
    { nameFilm: "Tuyết Mùa Hạ", image: "imgs/tuyetmuaha.jpg", content: "Lấy đi tài tình yêu tuổi thanh xuân học đường, Snow In Summer mang đến những mẩu chuyện chân thực và chạm đến trái tim người xem, đặc biệt với các bạn trẻ", rating: 5, Category: "Phim Ngắn"  },
    
  ];

  export default list;