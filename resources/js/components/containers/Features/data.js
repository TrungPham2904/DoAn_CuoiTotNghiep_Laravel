

const list = [
    { nameFilm: "Quân Vương Bất Diệt", image: "imgs/quanvuong.jpg", content: "Quân Vương Bất Diệt sẽ xoay quanh đề tài về thế giới song song. Giữa thời điểm căng não của một vị vua xứ Kim Chi đang cố ngăn ác quỷ xâm nhập vào thế giới loài người", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Chuyện Đời Bác Sĩ", image: "imgs/cdbacsi.jpg", content: "Bộ phim này được lên kế hoạch cho ba mùa. Có khoảng 5 bác sĩ, những người học cùng trường y năm 1999 hiện là bạn bè và làm việc cùng nhau tại cùng một bệnh viện.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Nhịp Đập Trái Tim", image: "imgs/ndtraitim.jpg", content: "Nhịp Đập Trái Tim 3 |Heart Signal Season 3 (2020).", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Kỹ Sư Tình Yêu", image: "imgs/kstinhyeu.jpg", content: "Kỹ Sư Tâm Hồn là một bộ phim khai thác công việc của các bác sĩ khoa tâm thần học. Nam chính Lee Shi Joon (Shin Ha Kyun) là một bác sĩ khoa tâm thần đầy tâm huyết với nghề.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Đại Chiến Kén Rể", image: "imgs/dckenre.jpg", content: "Phim Đại Chiến Kén Rể (Oh My Baby) kể về Jang Ha-Ri (Jang Nara) là một bà mẹ đơn thân và 39 tuổi. Cô làm việc như một phó giám đốc tại công ty tạp chí nuôi dạy con.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Trường Tương Thủ", image: "imgs/truongtungthu.jpg", content: "Trường Tương Thủ là câu chuyện về loạn thế ngũ đại thập quốc, Hoa Mộc Cẩn và muội muội sinh đôi Hoa Cẩm Tú bị bán vào Nguyên gia làm gia nô.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Quản Gia", image: "imgs/quangia.jpg", content: "Quản Gia |Master In The House (2018).", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Tái Sinh", image: "imgs/taisinh.jpg", content: "Bộ phim này kể về một thám tử, người yêu của anh ta và một kẻ giết người hàng loạt bị ám ảnh từ những năm 1980 được tái sinh thành một công tố viên, một nhà khảo cổ học và một sinh viên y khoa ngày nay. ", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Nữ Đặc Vụ", image: "imgs/ndacvu.jpg", content: "Baek Chan Mi ( Choi Kang Hee ) là một đặc vụ đen huyền thoại cho NIS, nhưng, do công việc quá mức của cô, cấp dưới của cô đã chết và cô đã lỡ bắt được mục tiêu của mình.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Tổ Chức", image: "imgs/tochuc.jpg", content: "Kang Ki Bum ( Choi Jin Hyuk ) là một thám tử ưu tú. Anh ta hiện đang điều tra tổ chức tội phạm Argos, nhưng, khi về nhà, anh ta tìm thấy một vài người đàn ông đeo mặt nạ.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Hồi Ức", image: "imgs/hoiuc.jpg", content: "Bộ phim này dựa trên Bản ghi nhớ webtoon của Jae Hoo được xuất bản từ năm 2016 -10 -15 đến 2018-Jan-20 bởi Công ty Daum Webtoon.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Săn Cáo", image: "imgs/sancao.jpg", content: "Hạ Viễn là một ngôi sao đang lên trong làng cảnh sát. Anh nổi tiếng là người có kỹ năng logic và khoa học vượt bậc.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Linh Cẩu", image: "imgs/linhcau.jpg", content: "Bộ phim này là về các luật sư phục vụ cho giới thượng lưu, 1 phần trăm. Mặc dù các nhân vật chính là luật sư, nó không phải là một bộ phim hợp pháp điển hình vì họ sử dụng luật pháp như một vũ khí sinh tồn.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Love 2", image: "imgs/love2.jpg", content: "Được đánh giá là web drama hấp dẫn nhất trong tháng 1 năm 2020, Real: Time: Love 2 chỉ gồm 8 tập phim nhỏ nhưng đã khiến không ít khán giả cảm thấy hài lòng bởi sự nhẹ nhàng và đậm chất Hàn Quốc.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Tình Lẳng Lơ", image: "imgs/langlo.jpg", content: "Club Friday the Series 12 tiếp nối thành công của các phần trước với tựa đề phần phim mới mang tên Rak Sideline, dự kiến gồm 4 tập và được lên sóng trên kênh GMM25 từ ngày 14 tháng 3 năm 2020.", rating: 5, Category: "Phim Tập"  },
    { nameFilm: "Lưỡng Thế Hoan", image: "imgs/thehoan.jpg", content: "Lưỡng Thế Hoan kể về câu chuyện giữa nàng Nguyên Thanh Ly (Trần Ngọc Kỳ) con gái của tướng quân, sau khi bị mất trí nhớ liền trốn tới huyện Thấm Hà làm sai dịch.", rating: 5, Category: "Phim Tập"  },
  ];

  export default list;