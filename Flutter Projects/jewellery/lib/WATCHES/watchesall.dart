import 'package:flutter/material.dart';
import 'package:jewellery/WATCHES/rolexwatche.dart';
import 'package:jewellery/WATCHES/normalwatche.dart';

class Watches extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final List<String> imageList = [
      "images/watch11.jpg",
      "images/watch12.jpg",
      "images/watch13.jpg",
      "images/watch14.jpg",
      "images/watch15.jpg",
      "images/watch16.jpg",
      "images/watch17.jpg",
    ];
    List<String> imglist = [
      "images/watch2.jpg",
      "images/watch21.jpg",
    ];
    return Scaffold(
      appBar: AppBar(
        title: const Text('Chanel'),
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
