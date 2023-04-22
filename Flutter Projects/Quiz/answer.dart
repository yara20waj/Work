import 'package:flutter/material.dart';

class Answer extends StatelessWidget {
  final VoidCallback selectHandler;
  final String answerText;

  Answer(this.selectHandler, this.answerText);

  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.infinity,
      child: RaisedButton(
        color: Color.fromARGB(255, 230, 84, 0),
        textColor: Colors.white,
        child: Text(answerText),
        onPressed: selectHandler,
      ),
      margin: new EdgeInsets.symmetric(vertical: 15.0), //RaisedButton
    ); //Container
  }
}
