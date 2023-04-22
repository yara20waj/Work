import 'package:flutter/material.dart';

class Result extends StatelessWidget {
  final int resultScore;
  final VoidCallback resetHandler;

  Result(this.resultScore, this.resetHandler);

//Remark Logic
  String get resultPhrase {
    String resultText;
    if (resultScore >= 41) {
      resultText = 'Awesome!';
      print(resultScore);
    } else if (resultScore >= 31) {
      resultText = 'Perfect!';
      print(resultScore);
    } else if (resultScore >= 21) {
      resultText = 'You need to work more!';
    } else if (resultScore >= 1) {
      resultText = 'You need to work hard!';
    } else {
      resultText = 'This is a poor score!';
      print(resultScore);
    }
    return resultText;
  }

  @override
  Widget build(BuildContext context) {
    return Center(
      child: Column(
        children: <Widget>[
          Text(
            "Done!",
            style: TextStyle(
                fontSize: 26, fontWeight: FontWeight.bold, color: Colors.white),
            textAlign: TextAlign.center,
          ), //Text
          Text(
            'Total Score = ' '$resultScore',
            style: TextStyle(
                fontSize: 36, fontWeight: FontWeight.bold, color: Colors.white),
            textAlign: TextAlign.center,
          ),
          Text(
            resultPhrase,
            style: TextStyle(
                fontSize: 26, fontWeight: FontWeight.bold, color: Colors.white),
            textAlign: TextAlign.center,
          ), //Text
          FlatButton(
            child: Text(
              'Restart The App',
            ), //Text
            textColor: Color.fromARGB(255, 230, 84, 0),
            onPressed: resetHandler,
          ), //FlatButton
        ], //<Widget>[]
      ), //Column
    ); //Center
  }
}
