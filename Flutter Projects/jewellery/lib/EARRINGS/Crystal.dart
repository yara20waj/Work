import 'package:carousel_slider/carousel_slider.dart';
import 'package:flutter/material.dart';
import 'package:flutter/rendering.dart';

class ChanelLoveHeartBag extends StatefulWidget {
  List<String> ChanelnLoveHeartBag = [
    "images/CrystalEarrings2.jpg",
    "images/CrystalEarrings1.jpg",
    "images/CrystalEarrings3.jpg",
    "images/CrystalEarrings4.jpg",
  ];

  ChanelLoveHeartBag({required this.ChanelnLoveHeartBag});

  @override
  _ChanelLoveHeartBagState createState() => _ChanelLoveHeartBagState();
}

class _ChanelLoveHeartBagState extends State<ChanelLoveHeartBag> {
  int _current = 0;

  @override
  Widget build(BuildContext context) {
    final List<Widget> imageSliders =
        widget.ChanelnLoveHeartBag.map((item) => ClipRRect(
              borderRadius: BorderRadius.all(
                Radius.circular(5.0),
              ),
              child: Stack(
                children: [
                  Image.network(
                    item,
                    fit: BoxFit.cover,
                  ),
                  Positioned(
                    bottom: 0.0,
                    left: 0.0,
                    right: 0.0,
                    child: Container(
                      //color: Color.fromARGB(100, 22, 44, 33),
                      decoration: BoxDecoration(
                        gradient: LinearGradient(
                          colors: [
                            Color.fromARGB(200, 0, 0, 0),
                            Color.fromARGB(0, 0, 0, 0),
                          ],
                          begin: Alignment.bottomCenter,
                          end: Alignment.topCenter,
                        ),
                      ),
                    ),
                  ),
                ],
              ),
            )).toList();

    return Column(
      children: [
        TextButton(
            child: const Text(
              'GOLD CRYSTAL EARRINGS',
              style: TextStyle(
                fontWeight: FontWeight.bold,
                fontSize: 18,
              ),
            ),
            onPressed: () {
              showModalBottomSheet(
                  context: context,
                  elevation: 4,
                  isScrollControlled: true,
                  builder: (_) => Container(
                      color: Colors.white.withOpacity(0.2),
                      padding: EdgeInsets.only(
                        top: 15,
                        left: 15,
                        right: 15,
                        bottom: MediaQuery.of(context).viewInsets.bottom + 20,
                      ),
                      child: Column(
                        mainAxisSize: MainAxisSize.min,
                        crossAxisAlignment: CrossAxisAlignment.end,
                        children: [
                          Flexible(
                              child: const Text(
                            "Description:"
                            "\nAn easy win on the style front - these fabulous oversized disc earrings are an instant modern classic. Stylish design with added sparkle, a contemporary jewelry classic - these gold crystal latch back earrings are a wonderful way to add sparkle to a party look."
                            "\n\nWeight: 11.72 g"
                            "\n\nDiameter: 3 cm"
                            "\n\nPrice:  1,72430\$"
                             ,
                          ))
                        ],
                      )));
            }),
        CarouselSlider(
          items: imageSliders,
          options: CarouselOptions(
              autoPlay: true,
              enlargeCenterPage: true,
              aspectRatio: 2.0,
              onPageChanged: (index, reason) {
                setState(() {
                  _current = index;
                });
              }),
        ),
      ],
    );
  }
}
