/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sistema;

import java.beans.PropertyChangeListener;
import java.beans.PropertyChangeSupport;
import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Transient;

/**
 *
 * @author ti.semed
 */
@Entity
@Table(name = "setor", catalog = "db_semed", schema = "")
@NamedQueries({
    @NamedQuery(name = "Setor.findAll", query = "SELECT s FROM Setor s"),
    @NamedQuery(name = "Setor.findByIdsetor", query = "SELECT s FROM Setor s WHERE s.idsetor = :idsetor"),
    @NamedQuery(name = "Setor.findBySetorNome", query = "SELECT s FROM Setor s WHERE s.setorNome = :setorNome"),
    @NamedQuery(name = "Setor.findBySetorSigla", query = "SELECT s FROM Setor s WHERE s.setorSigla = :setorSigla"),
    @NamedQuery(name = "Setor.findBySetorEmail", query = "SELECT s FROM Setor s WHERE s.setorEmail = :setorEmail")})
public class Setor implements Serializable {
    @Transient
    private PropertyChangeSupport changeSupport = new PropertyChangeSupport(this);
    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "idsetor")
    private Integer idsetor;
    @Column(name = "setor_nome")
    private String setorNome;
    @Column(name = "setor_sigla")
    private String setorSigla;
    @Column(name = "setor_email")
    private String setorEmail;

    public Setor() {
    }

    public Setor(Integer idsetor) {
        this.idsetor = idsetor;
    }

    public Integer getIdsetor() {
        return idsetor;
    }

    public void setIdsetor(Integer idsetor) {
        Integer oldIdsetor = this.idsetor;
        this.idsetor = idsetor;
        changeSupport.firePropertyChange("idsetor", oldIdsetor, idsetor);
    }

    public String getSetorNome() {
        return setorNome;
    }

    public void setSetorNome(String setorNome) {
        String oldSetorNome = this.setorNome;
        this.setorNome = setorNome;
        changeSupport.firePropertyChange("setorNome", oldSetorNome, setorNome);
    }

    public String getSetorSigla() {
        return setorSigla;
    }

    public void setSetorSigla(String setorSigla) {
        String oldSetorSigla = this.setorSigla;
        this.setorSigla = setorSigla;
        changeSupport.firePropertyChange("setorSigla", oldSetorSigla, setorSigla);
    }

    public String getSetorEmail() {
        return setorEmail;
    }

    public void setSetorEmail(String setorEmail) {
        String oldSetorEmail = this.setorEmail;
        this.setorEmail = setorEmail;
        changeSupport.firePropertyChange("setorEmail", oldSetorEmail, setorEmail);
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idsetor != null ? idsetor.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Setor)) {
            return false;
        }
        Setor other = (Setor) object;
        if ((this.idsetor == null && other.idsetor != null) || (this.idsetor != null && !this.idsetor.equals(other.idsetor))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "telas.Setor[ idsetor=" + idsetor + " ]";
    }

    public void addPropertyChangeListener(PropertyChangeListener listener) {
        changeSupport.addPropertyChangeListener(listener);
    }

    public void removePropertyChangeListener(PropertyChangeListener listener) {
        changeSupport.removePropertyChangeListener(listener);
    }
    
}
