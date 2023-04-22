import 'package:flutter/material.dart';
import 'package:jewellery/EARRINGS/Crystal.dart';
import 'package:jewellery/EARRINGS/golden.dart';

class Earrings extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final List<String> imageList = [
      "images/CrystalEarrings2.jpg",
      "images/CrystalEarrings1.jpg",
      "images/CrystalEarrings3.jpg",
      "images/CrystalEarrings4.jpg"
    ];
    List<String> imglist = [
      "images/golden4.jpg",
      "images/golden5.jpg",
      "images/golden6.jpg",
      "images/golden7.jpg",
    ];
    return Scaffold(
      appBar: AppBar(
        title: const Text('Earrings'),
      ),
      body: Column(
        children: [
          ChanelLoveHeartBag(ChanelnLoveHeartBag: imageList),
          CarouselWithDotsPage(imglist: imglist),
        ],
      ),
    );
  }
}
