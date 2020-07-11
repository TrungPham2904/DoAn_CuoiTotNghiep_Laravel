

const list = [
    { nameFilm: "Thiên Tỉnh Chi Lộ", image: "imgs/chilo.jpg", content: "Thiên Tỉnh Chi Lộ là bộ phim về đề tài võ hiệp kỳ ảo, xoay quanh nam chính Lộ Bình và cuộc đấu tranh giữa các học viện dị năng trong một đại lục giả tưởng.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Sử Phi Giá Đáo", image: "imgs/spgiadao.jpg", content: "Sửu Phi Giá Đáo - Nghĩa Kỳ Quân Thân Yêu kể về thời Hi Hòa, Lan Châu là nơi sinh sóng của Nhân tộc, Vu tộc và Lang tộc.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Bế Cổ Thành", image: "imgs/becothanh.jpg", content: "Hoàng đế Bắc Tống Triệu Trinh phát hiện ra mình không phải là con ruột của Thái hậu, mà là con của tỳ nữ bên người Thái hậu năm đó – Lý Lan Huệ.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Mây Gió Và Mưa", image: "imgs/giovamua.jpg", content: "Bộ phim này dựa trên cuốn tiểu thuyết Gió 과 Wind / Gió, Mây và Mưa do Lee Byung Joo xuất bản từ năm 1977 đến 1987 trên tờ báo The Chosun Ilbo đấm.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Hán Thời Quan", image: "imgs/hanthoiquan.jpg", content: "Cuối triều đại Đông Hán,Lưu Tiết con cháu của một người trung lương,vì trốn tránh thời loạn ly, mà đã bảo vệ một ngôi quan ải đổ nát ở trong sa mạc lớn,quan ải này là Hán Thời Quan.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Linh Thú", image: "imgs/linhthu.jpg", content: "Ở một bộ tộc xa xôi, có nuôi một con linh thú đến từ núi Tuyết Đề. Sau khi yêu quái Hoàng Bì Tử biết tin, đã đem người tới đó hòng tước đoạt. Không ngờ trong trận ác chiến, linh thú đã thừa cơ chạy thoát.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Đại Thiên Bồng", image: "imgs/daithienbong.jpg", content: "Thiên Bồng Nguyên Soái nhận phải khá nhiều chỉ trích từ giới chuyên môn bởi một số phân đoạn quá lệch lạc nguyên tác và một số cảnh nhạy cảm trên tiên giới.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Lưỡng Thế Hoan", image: "imgs/thehoan.jpg", content: "Lưỡng Thế Hoan kể về câu chuyện giữa nàng Nguyên Thanh Ly (Trần Ngọc Kỳ) con gái của tướng quân, sau khi bị mất trí nhớ liền trốn tới huyện Thấm Hà làm sai dịch.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Kingdom2", image: "imgs/kingdom2.jpg", content: "Đây sẽ là loạt phim gốc Hàn Quốc thứ hai của Netflix. Nó được chuyển thể từ sê-ri webcomic “신의 / Vùng đất của các vị thần, được viết bởi Nhà văn Kim Eun Hee.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Đại Chúa Tể", image: "imgs/daichuate.png", content: "Đại Chúa Tể xoay quanh câu chuyện của chàng thiếu niên trẻ tuổi Mục Trần khí chất hơn người, anh tuấn lấy thiện trừ ác, nhờ vậy mà có được cả tình yêu và những người bạn tốt.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Kingdom1", image: "imgs/kingdom1.jpg", content: "Lấy bối cảnh hàn quốc thời trung cổ Joseon, một vị hoàng tử được phái đi điều tra vụ án do bệnh dịch hoành hành ở khắp đấy nước.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Sĩ Nữ Đồ", image: "imgs/sinudo.jpg", content: "Sĩ Nữ Đồ (Imperial Portrait of Consorts) là một bộ phim mới chiếu rạp cổ trang của Trung Quốc. Bộ phim mang sắc màu nhẹ nhàng tình cảm thay vì những bộ phim kỹ xảo kiếm hiệp tràn lan như hiện nay.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Phong Thần Cốt", image: "imgs/phongthancot.jpg", content: "Nội dung xoay quanh cuộc chiến tranh giành Tu La Nhãn giữa các thế lực trong giang hồ và triều đình, cùng những ân oán không hồi kết.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Mạnh Y Điềm Thê", image: "imgs/manhydiemthe.jpg", content: "Phim Manh Y Điềm Thê kể về câu chuyện tiểu thái y ở thái y viện là Điền Thất (Tôn Thiên) vô tình được điều đến làm việc ở phủ tiết độ sứ, gây ra một loạt những chuyện hài hước.", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Tương Dạ 2", image: "imgs/tuongda2.jpg", content: "Phim Tương Dạ phần 2 - Ever Night 2 (将夜2) kể về Ninh Khuyết, tiểu quân nhân của biên giới vì gia đình bình phản chiêu tuyết (tìm cách trả lại trong sạch cho gia đình).", rating: 5, Category: "Phim Tài Liệu"  },
    { nameFilm: "Cẩm Y Chi Hạ", image: "imgs/camychiha.jpg", content: "Phim Cẩm Y Chi Hạ 锦衣之下 (Under The Power) được chuyển thể từ tiểu thuyết cùng tên của tác giả Lam Sắc Sư Phân.", rating: 5, Category: "Phim Tài Liệu"  },
    
  ];

  export default list;