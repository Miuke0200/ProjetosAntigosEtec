namespace SusCsharp
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.label1 = new System.Windows.Forms.Label();
            this.pictureBox4 = new System.Windows.Forms.PictureBox();
            this.acessonormal = new System.Windows.Forms.PictureBox();
            this.acessoP = new System.Windows.Forms.PictureBox();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.data = new System.Windows.Forms.Label();
            this.lbhora = new System.Windows.Forms.Label();
            this.lbSenha = new System.Windows.Forms.Label();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox4)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.acessonormal)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.acessoP)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(315, 12);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(141, 13);
            this.label1.TabIndex = 1;
            this.label1.Text = "RETIRE SUA SENHA AQUI";
            // 
            // pictureBox4
            // 
            this.pictureBox4.Image = global::SusCsharp.Properties.Resources.saida;
            this.pictureBox4.Location = new System.Drawing.Point(464, 348);
            this.pictureBox4.Name = "pictureBox4";
            this.pictureBox4.Size = new System.Drawing.Size(40, 31);
            this.pictureBox4.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox4.TabIndex = 5;
            this.pictureBox4.TabStop = false;
            // 
            // acessonormal
            // 
            this.acessonormal.Image = global::SusCsharp.Properties.Resources.dispensaa;
            this.acessonormal.Location = new System.Drawing.Point(23, 259);
            this.acessonormal.Name = "acessonormal";
            this.acessonormal.Size = new System.Drawing.Size(173, 120);
            this.acessonormal.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.acessonormal.TabIndex = 3;
            this.acessonormal.TabStop = false;
            this.acessonormal.Click += new System.EventHandler(this.PictureBox3_Click);
            // 
            // acessoP
            // 
            this.acessoP.Image = global::SusCsharp.Properties.Resources.acesso;
            this.acessoP.Location = new System.Drawing.Point(23, 101);
            this.acessoP.Name = "acessoP";
            this.acessoP.Size = new System.Drawing.Size(173, 114);
            this.acessoP.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.acessoP.TabIndex = 2;
            this.acessoP.TabStop = false;
            this.acessoP.Click += new System.EventHandler(this.AcessoP_Click);
            // 
            // pictureBox1
            // 
            this.pictureBox1.Image = global::SusCsharp.Properties.Resources.sus1;
            this.pictureBox1.Location = new System.Drawing.Point(23, 12);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(173, 61);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox1.TabIndex = 0;
            this.pictureBox1.TabStop = false;
            // 
            // data
            // 
            this.data.AutoSize = true;
            this.data.Location = new System.Drawing.Point(224, 301);
            this.data.Name = "data";
            this.data.Size = new System.Drawing.Size(28, 13);
            this.data.TabIndex = 9;
            this.data.Text = "data";
            // 
            // lbhora
            // 
            this.lbhora.AutoSize = true;
            this.lbhora.Location = new System.Drawing.Point(224, 330);
            this.lbhora.Name = "lbhora";
            this.lbhora.Size = new System.Drawing.Size(28, 13);
            this.lbhora.TabIndex = 10;
            this.lbhora.Text = "hora";
            // 
            // lbSenha
            // 
            this.lbSenha.BackColor = System.Drawing.SystemColors.GradientInactiveCaption;
            this.lbSenha.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.lbSenha.Location = new System.Drawing.Point(338, 39);
            this.lbSenha.Name = "lbSenha";
            this.lbSenha.Size = new System.Drawing.Size(102, 176);
            this.lbSenha.TabIndex = 11;
            // 
            // Form1
            // 
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.None;
            this.ClientSize = new System.Drawing.Size(516, 391);
            this.Controls.Add(this.lbSenha);
            this.Controls.Add(this.lbhora);
            this.Controls.Add(this.data);
            this.Controls.Add(this.pictureBox4);
            this.Controls.Add(this.acessonormal);
            this.Controls.Add(this.acessoP);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.pictureBox1);
            this.Name = "Form1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Form1";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox4)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.acessonormal)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.acessoP)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.PictureBox acessoP;
        private System.Windows.Forms.PictureBox acessonormal;
        private System.Windows.Forms.PictureBox pictureBox4;
        private System.Windows.Forms.Label data;
        private System.Windows.Forms.Label lbhora;
        private System.Windows.Forms.Label lbSenha;
    }
}

