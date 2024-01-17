package com.example.appxpto;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

public class activitydois extends AppCompatActivity {
TextView txtNome;
TextView txtSalarioL;

    @Override

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_activitydois);
        txtNome = findViewById(R.id.txtNome);
        Intent Iorigem = getIntent();
        txtNome.setText(Iorigem.getStringExtra("funcionario"));
        txtSalarioL = findViewById(R.id.txtSalarioL);
        Intent Sorigem = getIntent();
        txtSalarioL.setText(Iorigem.getStringExtra("salario"));
    }



    public void btnVoltar(View view) {
        Intent intent = new Intent(this, MainActivity.class);



        startActivity(intent);

    }

}